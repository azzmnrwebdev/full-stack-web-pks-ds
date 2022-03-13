<?php

namespace App\Http\Controllers;
use App\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request){
        request()->validate([
            'reply' => 'required'
        ]);

        $reply = new Reply;

        $reply->reply = $request->reply;
        $reply->users_id = Auth::id();
        $reply->comment_id = $request->comment_id;

        $reply->save();

        return redirect()->back();
    }
}
