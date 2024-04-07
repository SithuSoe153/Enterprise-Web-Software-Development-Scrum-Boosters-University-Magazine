<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Mail\SubmissionMail;
use App\Models\Magazine;
use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\AssignedRole;
use App\Models\Faculty;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{



    public function edit(Article $article)
    {

        return view('frontend/Student/contribution-edit', compact('article'));
    }
    public function mcEdit(Article $article)
    {

        return view('frontend/Marketing Coordinator/contribution-update', compact('article'));
    }


    public function update(Request $request, Article $article)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:1000',
            'articles.*' => 'nullable|mimes:doc,docx',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Adjust the size as needed
            'terms' => 'accepted' // Validation rule for the Terms checkbox

        ]);

        // Update the article's title
        $article->update(['title' => $request->title, 'description' => $request->description]);

        // Handle article images if new images are provided
        if ($request->hasFile('images')) {
            // Define the image extensions to be deleted
            $imageExtensions = ['jpg', 'jpeg', 'png'];

            // Delete existing image files associated with the article
            foreach ($imageExtensions as $extension) {
                $article->files()->where('file_path', 'LIKE', "%.$extension")->delete();
            }

            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('public/articles');
                // Create a new record in the files table for each image
                $article->files()->create(['file_path' => $imagePath]);
            }
        }

        // Handle article files if new files are provided
        if ($request->hasFile('articles')) {
            // Define the document extensions to be deleted
            $documentExtensions = ['doc', 'docx'];

            // Delete existing document files associated with the article
            foreach ($documentExtensions as $extension) {
                $article->files()->where('file_path', 'LIKE', "%.$extension")->delete();
            }

            foreach ($request->file('articles') as $articleFile) {
                $filePath = $articleFile->store('public/articles');
                // Create a new record in the files table for each article file
                $article->files()->create(['file_path' => $filePath]);
            }
        }

        if (auth()->user()->hasRole(['Marketing Coordinator'])) {

            return redirect('mc/article-detail/' . $article->id);
        } else {

            return redirect('/article-detail/' . $article->id);
        }
    }



    // public function update(Request $request, Article $article) // Type-hint the Article model
    // {
    //     $cleanData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'articles.*' => 'required|mimes:doc,docx',
    //         'images.*' => 'image|mimes:jpg,jpeg,png|max:2048' // Adjust the size as needed
    //     ]);


    //     $article->update($cleanData);
    //     // dd($article->update($cleanData));
    //     return redirect('/article-detail/' . $article->id);;
    // }


    public function articleDetail(Article $article) // Type-hint the Article model
    {
        // dd($article);
        return view('frontend/Student/contribution-detail', compact('article'));
    }
    public function mcArticleDetail(Article $article) // Type-hint the Article model
    {
        // dd($article);
        return view('frontend/Marketing Coordinator/contribution-detail', compact('article'));
    }

    public function toggleSelected(Article $article, Request $request) // Type-hint the Article model
    {
        // No need to find the article, it's already injected by Laravel due to route model binding
        $isSelected = filter_var($request->is_selected, FILTER_VALIDATE_BOOLEAN); // Ensure boolean value

        $article->is_selected = $isSelected;
        $article->save();

        return response()->json(['success' => true, 'article' => $article]);
    }


    public function upload(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'articles.*' => 'nullable|mimes:doc,docx',
            'images.*' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Adjust the size as needed
            'terms' => 'accepted' // Validation rule for the Terms checkbox
        ]);


        // Assuming you're manually managing the user authentication for now
        $user = auth()->user();

        // Create a unique directory for this specific article upload
        $uniqueFolder = 'user' . $user->id . '_' . now()->format('YmdHis');
        $articleDirectory = 'public/articles/' . $uniqueFolder;

        Storage::makeDirectory($articleDirectory);

        // Store the article's Word documents and create the article record
        $article = $user->articles()->create([
            // 'magazine_id' => Magazine::latest()->first()->id,
            'magazine_id' => 2,
            'title' => $request->title,
            'description' => $request->description,
            // Include other fields as necessary
        ]);

        // Store article files (Word documents)
        if ($request->hasFile('articles')) {
            foreach ($request->file('articles') as $articleFile) {
                $articlePath = $articleFile->store($articleDirectory);
                // Create a record in the files table for each article file
                $article->files()->create(['file_path' => $articlePath]);
            }
        }

        // Store article images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store($articleDirectory);
                // Create a record in the files table for each image
                $article->files()->create(['file_path' => $imagePath]);
            }
        }

        $facultyId = auth()->user()->assignedRoles->where('user_id', auth()->user()->id)->first()->faculty_id;
        // Find the Marketing Coordinator of the specified faculty
        $marketingCoordinator = AssignedRole::where('faculty_id', $facultyId)
            ->where('role_id', 2) // Assuming 2 represents the Marketing Coordinator role
            ->first();
        $facultyName = Faculty::find($facultyId)->name;

        if ($marketingCoordinator) {
            // Retrieve the email address of the Marketing Coordinator
            $coordinatorEmail = User::find($marketingCoordinator->user_id)->email;
            $coordinatorName = User::find($marketingCoordinator->user_id)->name;

            // Send email with necessary details of the new user
            try {
                Mail::to($coordinatorEmail)
                    ->queue(new SubmissionMail($user, $facultyName, $coordinatorName));
            } catch (\Throwable $th) {
                return response()->json(['success' => 'New Article Submission Failed']);
            }
        }

        return redirect('/dashboard')->with('success', 'Your article submission was successful! Thank you for your contribution.'); // Ensure you have this route defined
    }



    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'articles.*' => 'required|mimes:doc,docx', // Change 'article' to 'articles.*' to handle multiple files
    //         'images.*' => 'image|mimes:jpg,jpeg,png|max:2048' // Adjust the size as needed
    //     ]);
    //     // dd($request->all());
    //     // Assuming you're manually managing the user authentication for now
    //     // $userId = 1; // Or however you determine the user's ID
    //     $user = auth()->user();

    //     // Create a unique directory for this specific article upload
    //     $uniqueFolder = 'user' . $user->id . '_' . now()->format('YmdHis');
    //     $articleDirectory = 'public/articles/' . $uniqueFolder;

    //     Storage::makeDirectory($articleDirectory);

    //     // Check if any article files were uploaded
    //     if ($request->hasFile('articles')) {
    //         // Store the article's Word documents and create the articles
    //         foreach ($request->file('articles') as $articleFile) {
    //             $articleFilePath = $articleFile->store($articleDirectory);

    //             // Create the article record
    //             $article = $user->articles()->create([
    //                 'magazine_id' => 1,
    //                 'user_id' => $user->id,
    //                 'title' => $request->title,
    //                 'file_path' => $articleFilePath, // Update the article with the file path
    //                 // Include other fields as necessary
    //             ]);

    //             // Store article images
    //             if ($request->hasFile('images')) {
    //                 foreach ($request->file('images') as $image) {
    //                     $imagePath = $image->store($articleDirectory);
    //                     // Associate each image with the article
    //                     $article->files()->create(['file_path' => $imagePath]);
    //                 }
    //             }
    //         }
    //     } else {
    //         // Handle case where no article files were uploaded
    //         // Optionally redirect back with an error message
    //         return redirect()->back()->withErrors(['articles' => 'Please upload at least one article.']);
    //     }

    //     return redirect()->route('upload.success'); // Ensure you have this route defined
    // }


    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'articles.*' => 'required|mimes:doc,docx', // Change 'article' to 'articles.*' to handle multiple files
    //         'images.*' => 'image|mimes:jpg,jpeg,png|max:2048' // Adjust the size as needed
    //     ]);

    //     // Assuming you're manually managing the user authentication for now
    //     // $userId = 1; // Or however you determine the user's ID
    //     $user = auth()->user();

    //     // Create a unique directory for this specific article upload
    //     $uniqueFolder = 'user' . $user->id . '_' . now()->format('YmdHis');
    //     $articleDirectory = 'public/articles/' . $uniqueFolder;

    //     Storage::makeDirectory($articleDirectory);

    //     // Check if any article files were uploaded
    //     if ($request->hasFile('articles')) {
    //         foreach ($request->file('articles') as $articleFile) {
    //             $articleFilePath = $articleFile->store($articleDirectory);

    //             // Create the article record
    //             $article = $user->articles()->create([
    //                 'magazine_id' => 1,
    //                 'user_id' => $user->id,
    //                 'title' => $request->title,
    //                 'file_path' => $articleFilePath, // Update the article with the file path
    //                 // Include other fields as necessary
    //             ]);

    //             // Store article images
    //             if ($request->hasFile('images')) {
    //                 foreach ($request->file('images') as $image) {
    //                     $imagePath = $image->store($articleDirectory);
    //                     // Associate each image with the article
    //                     $article->files()->create(['file_path' => $imagePath]);
    //                 }
    //             }
    //         }
    //     } else {
    //         // Handle case where no article files were uploaded
    //         // Optionally redirect back with an error message
    //         return redirect()->back()->withErrors(['articles' => 'Please upload at least one article.']);
    //     }

    //     return redirect()->route('upload.success'); // Ensure you have this route defined
    // }





    // public function showUploadForm()
    // {
    //     return view('upload-form');
    // }

    protected $fillable = ['title', 'user_id', 'file_path'];
    public function downloadArticlesZip()
    {


        $zip = new ZipArchive;
        $zipFileName = 'articles_' . now()->format('YmdHis') . '.zip';

        if (is_null($zipFileName)) {
            // Handle the error (e.g., log, throw an exception, return an error response)

            return response()->json(['error' => 'Filename is null'], 500);
        }


        $zipPath = storage_path('app/public/' . $zipFileName);


        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {

            if (request()->query('article')) {

                $articleId = request()->query('article');
                $article = Article::find($articleId);

                // dd($articles);

                // dd($articleId);

                $articleFolderPath = storage_path('app/public/articles/user' . $article->user_id . '_' . $article->created_at->format('YmdHis'));


                $files = Storage::files('public/articles/user' . $article->user_id . '_' . $article->created_at->format('YmdHis'));

                foreach ($files as $file) {
                    // Add files to zip
                    $relativePath = substr($file, strlen('public/'));
                    $zip->addFile(storage_path('app/' . $file), $relativePath);
                }
            } else {
                // Retrieve all articles with status 1
                $articles = Article::where('is_selected', 1)->get();
                foreach ($articles as $article) {
                    // dd($article);
                    $articleFolderPath = storage_path('app/public/articles/user' . $article->user_id . '_' . $article->created_at->format('YmdHis'));

                    $files = Storage::files('public/articles/user' . $article->user_id . '_' . $article->created_at->format('YmdHis'));

                    foreach ($files as $file) {
                        // Add files to zip
                        $relativePath = substr($file, strlen('public/'));
                        $zip->addFile(storage_path('app/' . $file), $relativePath);
                    }
                }
            }


            $zip->close();


            // dd($zipPath);
            // Check if the file exists
            // if (!Storage::exists($zipPath)) {
            //     return redirect()->back()->with('success', 'Sorry! There are no published articles for this year available for download yet.');
            // }


            // Download ZIP
            return response()->download($zipPath)->deleteFileAfterSend(true);
        } else {
            return redirect()->back()->with('error', 'Cannot create ZIP file.');
        }
    }





    // public function downloadZip()
    // {
    //     // Get all user articles
    //     $articles = Article::with('files')->get();

    //     // Create a temporary directory to store article files
    //     $tempDirectory = storage_path('app/temp');
    //     if (!file_exists($tempDirectory)) {
    //         mkdir($tempDirectory);
    //     }

    //     // Loop through articles, copy files to temporary directory
    //     foreach ($articles as $article) {
    //         foreach ($article->files as $file) {
    //             Storage::copy($file->file_path, $tempDirectory . '/' . basename($file->file_path));
    //         }
    //     }

    //     // Create ZIP file
    //     $zipFileName = 'user_articles_' . now()->format('YmdHis') . '.zip';
    //     $zipFilePath = storage_path('app/public/' . $zipFileName);

    //     $zip = new ZipArchive;
    //     if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
    //         $files = glob($tempDirectory . '/*');
    //         foreach ($files as $file) {
    //             $zip->addFile($file, basename($file));
    //         }
    //         $zip->close();
    //     }

    //     // Delete temporary directory
    //     $this->deleteDirectory($tempDirectory);

    //     // Download ZIP file
    //     return response()->download($zipFilePath)->deleteFileAfterSend(true);
    // }

    // private function deleteDirectory($directory)
    // {
    //     if (!file_exists($directory)) {
    //         return;
    //     }

    //     $files = array_diff(scandir($directory), ['.', '..']);
    //     foreach ($files as $file) {
    //         (is_dir("$directory/$file")) ? $this->deleteDirectory("$directory/$file") : unlink("$directory/$file");
    //     }

    //     rmdir($directory);
    // }
}



// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ArticleController extends Controller
// {
//     //
// }