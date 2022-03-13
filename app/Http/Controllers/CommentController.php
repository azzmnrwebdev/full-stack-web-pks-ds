<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\CommentStoredEvent;
use App\Mail\PostAuthorMail;
use Illuminate\Http\Request;
use App\Mail\CommentAuthorMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
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
        # mengambil data dari tabel comment
        $comment = Comment::latest()->get();

        # memberikan respon dalam bentuk JSON
        # dengan status code 200 yang artinya berhasil
        return response()->json([
            'success' => true,
            'message' => 'Get All Comment',
            'data'    => $comment
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
            'content'   => 'required',
            'post_id' => 'required'
        ]);

        # membuat kondisi jika ada salah satu
        # attribute data yang kosong, dan
        # memberikan respon dalam bentuk JSON
        # status code 400 artinya kesalahan saat validasi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        # menyimpan data ke database
        $comment = Comment::create([
            'content'  => $request->content,
            'post_id' => $request->post_id
        ]);

        # memanggil event CommentStoredEvent
        event(new CommentStoredEvent($comment));

        # mengirimkan email kepada user
        # yang membuat post nya
        // Mail::to($comment->post->user->email)->send(new PostAuthorMail($comment));

        # mengirimkan email kepada user
        # yang membuat comment nya
        // Mail::to($comment->user->email)->send(new CommentAuthorMail($comment));

        # memberikan response message jika
        # data berhasil disimpan ke db, dan
        # memberikan response status code 201
        if ($comment) {

            return response()->json([
                'success' => true,
                'message' => 'Comment is added successfully',
                'data'    => $comment
            ], 201);
        }

        # gagal menyimpan data ke database
        return response()->json([
            'success' => false,
            'message' => 'Comment failed to save',
        ], 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        # mencari data comment sesuai id nya
        $comments = Comment::findOrfail($comment);

        # memberikan respon dalam bentuk JSON
        return response()->json([
            'success' => true,
            'message' => 'Get Detail Comment',
            'data'    => $comments
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        # membuat validasi
        $validator = Validator::make($request->all(), [
            'content'   => 'required',
            'post_id' => 'required'
        ]);

        # membuat kondisi jika ada salah satu
        # attribute data yang kosong, dan
        # memberikan respon dalam bentuk JSON
        # status code 400 artinya kesalahan saat validasi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        # mencari data comment sesuai id nya
        $comments = Comment::findOrFail($comment->id);

        if ($comments) {
            $user = auth()->user();

            if ($comment->user_id != $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Comment bukan milik anda'
                ], 403);
            }

            # meng-update data comment
            $comment->update([
                'content'  => $request->content,
                'post_id' => $request->post_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Comment is update successfully',
                'data'    => $comments
            ], 200);
        }

        # kesalahan dalam mengupdate data
        # maka akan muncul status code 404
        return response()->json([
            'success' => false,
            'message' => 'Comment not found',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        # mencari data comment sesuai id
        $comments = Comment::findOrfail($comment->id);

        if ($comments) {
            $user = auth()->user();

            if ($comment->user_id != $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Comment bukan milik anda'
                ], 403);
            }

            # meng-hapus data comment
            $comments->delete();

            return response()->json([
                'success' => true,
                'message' => 'Comment is delete successfully',
            ], 200);
        }

        # kesalahan dalam mengupdate data
        # maka akan muncul status code 404
        return response()->json([
            'success' => false,
            'message' => 'Comment not found',
        ], 404);
    }
}
