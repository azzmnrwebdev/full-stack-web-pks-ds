<?php

namespace App\Http\Controllers;

use App\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCast = DB::table('cast')->get();
        return view('cast.index', compact('dataCast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|unique:cast|max:45',
                'umur' => 'required|numeric|min:18',
                'bio' => 'required',
            ],

            [
                //Pesan Error
                'nama.required' => 'Nama Wajib di Isi',
                'nama.unique' => 'Nama Tidak Boleh Sama',
                'nama.max' => 'Nama Tidak Boleh Melebihi 45 Karakter',
                'umur.required' => 'Umur Wajib di Isi',
                'umur.numeric' => 'Umur Hanya Boleh Berupa Angka',
                'umur.min' => 'Minimal Umur Berusia 18 Tahun',
                'bio.required' => 'Bio Wajib di Isi',
            ]
        );

        DB::table('cast')->insert(
            [
                'nama' => $request->nama,
                'umur' => $request->umur,
                'bio' => $request->bio,
                "created_at" =>  date('Y-m-d G:i:s'),
                "updated_at" => date('Y-m-d G:i:s'),
            ]
        );

        return redirect('/cast');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataCast = DB::table('cast')->where('id', $id)->get();

        return view('cast.show', compact('dataCast'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataCast = DB::table('cast')->where('id', $id)->get();

        return view('cast.edit', compact('dataCast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama' => 'required|max:45',
                'umur' => 'required|numeric|min:18',
                'bio' => 'required',
            ],

            [
                //Pesan Error
                'nama.required' => 'Nama Wajib di Isi',
                'nama.max' => 'Nama Tidak Boleh Melebihi 45 Karakter',
                'umur.required' => 'Umur Wajib di Isi',
                'umur.numeric' => 'Umur Hanya Boleh Berupa Angka',
                'umur.min' => 'Minimal Umur Berusia 18 Tahun',
                'bio.required' => 'Bio Wajib di Isi',
            ]
        );

        DB::table('cast')->where('id', $id)->update(
            [
                'nama' => $request->nama,
                'umur' => $request->umur,
                'bio' => $request->bio,
                "updated_at" => date('Y-m-d G:i:s'),
            ]
        );

        return redirect('/cast');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('cast')->where('id', $id)->delete();
        return redirect('/cast');
    }
}
