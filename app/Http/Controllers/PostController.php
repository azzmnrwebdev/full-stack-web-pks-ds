<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # mengambil data dari tabel post
        $posts = Post::latest()->get();

        # memberikan respon dalam bentuk JSON
        # dengan status code 200 yang artinya berhasil
        return response()->json([
            'success' => true,
            'message' => 'Get All Post',
            'data'    => $posts
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # membuat validasi
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'description' => 'required',
        ]);

        # membuat kondisi jika ada salah satu
        # attribute data yang kosong, dan
        # memberikan respon dalam bentuk JSON
        # status code 400 artinya kesalahan saat validasi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // $user = auth()->user();

        # menyimpan data ke database
        $post = Post::create([
            'title'     => $request->title,
            'description'   => $request->description,
            // 'user_id' => $user->id
        ]);

        # memberikan response message jika
        # data berhasil disimpan ke db, dan
        # memberikan response status code 201
        if ($post) {

            return response()->json([
                'success' => true,
                'message' => 'Post is added successfully',
                'data'    => $post
            ], 201);
        }

        # gagal menyimpan data ke database
        return response()->json([
            'success' => false,
            'message' => 'Post failed to save',
        ], 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        # mencari data post sesuai id nya
        $post = Post::findOrfail($post);

        # memberikan respon dalam bentuk JSON
        return response()->json([
            'success' => true,
            'message' => 'Get Detail Post',
            'data'    => $post
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        # membuat validasi
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'description' => 'required',
        ]);

        # membuat kondisi jika ada salah satu
        # attribute data yang kosong, dan
        # memberikan respon dalam bentuk JSON
        # status code 400 artinya kesalahan saat validasi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        # mencari data post sesuai id nya
        $post = Post::findOrFail($post->id);

        if ($post) {
            $user = auth()->user();

            if ($post->user_id != $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Post bukan milik anda'
                ], 403);
            }

            # meng-update data post
            $post->update([
                'title'     => $request->title,
                'description'   => $request->description
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post is update successfully',
                'data'    => $post
            ], 200);
        }

        # kesalahan dalam mengupdate data
        # maka akan muncul status code 404
        return response()->json([
            'success' => false,
            'message' => 'Post not found',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        # mencari data post sesuai id
        $posts = Post::findOrfail($post->id);

        if ($posts) {
            $user = auth()->user();

            if ($post->user_id != $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Post bukan milik anda'
                ], 403);
            }

            # meng-hapus data post
            $posts->delete();

            return response()->json([
                'success' => true,
                'message' => 'Post is delete successfully',
            ], 200);
        }

        # kesalahan dalam mengupdate data
        # maka akan muncul status code 404
        return response()->json([
            'success' => false,
            'message' => 'Post not found',
        ], 404);
    }
}
