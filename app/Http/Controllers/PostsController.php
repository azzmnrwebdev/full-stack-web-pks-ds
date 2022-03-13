<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Posts::all();
        $posts = Posts::where('users_id', Auth::id())->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $CaptionName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('post'), $CaptionName);

        Posts::create([
            'users_id' => auth()->id(),
            'caption' => request('caption'),
            'foto' => $CaptionName,
        ]);

        Alert::success('Success', 'Post successfully added');

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::findOrFail($id);

        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Posts::findOrFail($id);

        return view('posts.edit', compact('posts'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'caption' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $posts = Posts::find($id);

        if ($request->has('foto')) {
            $CaptionName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('post'), $CaptionName);

            $path = "post/";
            File::delete($path . $posts->foto);

            $posts->caption = $request->caption;
            $posts->foto = $CaptionName;
        } else {
            $posts->caption = $request->caption;
        }

        $posts->update();

        Alert::success('Update', 'Posts data successfully updated');

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::find($id);

        $path = "post/";
        File::delete($path . $posts->foto);

        $posts->delete();

        return redirect('/posts');
    }
}
