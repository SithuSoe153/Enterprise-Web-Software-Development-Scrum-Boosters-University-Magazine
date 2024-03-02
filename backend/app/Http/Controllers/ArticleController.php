<?php

namespace App\Http\Controllers;

use ZipArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\File;
use App\Models\User;


class ArticleController extends Controller
{


    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'articles.*' => 'required|mimes:doc,docx',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048' // Adjust the size as needed
        ]);

        // Assuming you're manually managing the user authentication for now
        $user = auth()->user();

        // Create a unique directory for this specific article upload
        $uniqueFolder = 'user' . $user->id . '_' . now()->format('YmdHis');
        $articleDirectory = 'public/articles/' . $uniqueFolder;

        Storage::makeDirectory($articleDirectory);

        // Store the article's Word documents and create the article record
        $article = $user->articles()->create([
            'magazine_id' => 1,
            'title' => $request->title,
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

        return redirect()->route('upload.success'); // Ensure you have this route defined
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





    public function showUploadForm()
    {
        return view('upload-form');
    }

    protected $fillable = ['title', 'user_id', 'file_path'];
    public function downloadArticlesZip()
    {
        $zip = new ZipArchive;
        $zipFileName = 'articles_' . now()->format('YmdHis') . '.zip';
        $zipPath = storage_path('app/public/' . $zipFileName);

        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            // Retrieve all articles with status 1
            $articles = Article::where('is_selected', 1)->get();

            foreach ($articles as $article) {
                $articleFolderPath = storage_path('app/public/articles/user' . $article->user_id . '_' . $article->created_at->format('YmdHis'));

                $files = Storage::files('public/articles/user' . $article->user_id . '_' . $article->created_at->format('YmdHis'));

                foreach ($files as $file) {
                    // Add files to zip
                    $relativePath = substr($file, strlen('public/'));
                    $zip->addFile(storage_path('app/' . $file), $relativePath);
                }
            }

            $zip->close();

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
