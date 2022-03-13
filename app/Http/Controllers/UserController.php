<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = User::get();
        $foto = Profile::get();
        return view('users', compact('users', 'foto'));
    }


    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
     */
    public function user($id)
    {
        $profiles = Profile::find($id);
        $user = User::find($id);

        return view('userView', compact('profiles', 'user'));
    }


    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxRequest(Request $request)
    {


        $user = User::find($request->user_id);
        $response = auth()->user()->toggleFollow($user);

        return response()->json(['success' => $response]);
    }
}
