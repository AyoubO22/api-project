<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'content' => 'required',
        ]);

        Comment::create([
            'news_id' => $request->news_id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}

