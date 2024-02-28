<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    protected $fillable = ['title', 'user_id', 'file_path'];

    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'article' => 'required|mimes:doc,docx',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048' // Adjust the size as needed
        ]);

        // Assuming you're manually managing the user authentication for now
        // $userId = 1; // Or however you determine the user's ID
        // $user = User::find(2);

        // Create a unique directory for this specific article upload
        $uniqueFolder = 'user' . auth()->user()->id . '_' . now()->format('YmdHis');
        $articleDirectory = 'public/articles/' . $uniqueFolder;

        Storage::makeDirectory($articleDirectory);


        $article = auth()->user()->articles()->create([
            'magazine_id' => 1,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            // Include other fields as necessary
        ]);

        // Store the article's Word document
        $articleFilePath = $request->file('article')->store($articleDirectory);

        // Update the article with the file path
        $article->update(['file_path' => $articleFilePath]);

        // Store article images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store($articleDirectory);
                // Assuming you have a method to associate files with the article
                $article->files()->create(['file_path' => $imagePath]);
            }
        }

        return redirect()->route('upload.success'); // Ensure you have this route defined
    }
}