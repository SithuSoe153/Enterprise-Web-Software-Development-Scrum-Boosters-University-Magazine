<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Article $article)
    {

        $cleanData = request()->validate([
            'comment' => 'required'
        ]);

        $cleanData['user_id'] = auth()->id();
        $comment = $article->comments()->create($cleanData);

        // $blog->subscribedUsers->filter(function ($user) {
        //     return $user->id !== auth()->id();
        // })->each(function ($user) use ($comment) {
        //     Mail::to($user->email)->queue(new NotifyUser($comment, $user));
        // });

        return back();
    }

    public function delete(Comment $comment)
    {
        $comment->where('id', $comment->id)->delete();
        return back();
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', [
            'comment' => $comment
        ]);
    }

    public function update(Comment $comment)
    {
        $commentBody = request('body');
        $c = $comment->where('id', $comment->id)->get();
        $c[0]->body = $commentBody;
        $c[0]->update();
        return redirect('/blogs/' . $comment->article->id);
    }
}