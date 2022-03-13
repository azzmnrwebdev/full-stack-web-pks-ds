<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        request()->validate([
            'comment' => 'required'
        ]);

        $comment = new Comment;

        $comment->comment = $request->comment;
        $comment->users_id = Auth::id();
        $comment->posts_id = $request->posts_id;

        $comment->save();

        return redirect()->back();
    }
}
