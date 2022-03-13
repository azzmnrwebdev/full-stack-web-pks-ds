<?php

namespace App\Http\Controllers;

use App\Posts;


class HomeController extends Controller
{
    public function index()
    {
        $posts = Posts::all();

        return view('index', compact('posts'));
    }
}
