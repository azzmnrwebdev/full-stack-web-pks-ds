<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::where('users_id', Auth::id())->get();
        $person = User::where('id', Auth::id())->get();

        return view('profile.index', compact('profiles', 'person'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profiles = Profile::findOrFail($id);

        return view('profile.edit', compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:45',
            'country' => 'required|string|max:45',
            'phone' => 'required|numeric',
            'gender' => 'required|string|max:45',
            'age' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profiles = Profile::find($id);

        if ($request->has('foto')) {
            $FotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img'), $FotoName);

            $path = "img/";
            File::delete($path . $profiles->foto);

            $profiles->fullname = $request->fullname;
            $profiles->age = $request->age;
            $profiles->gender = $request->gender;
            $profiles->phone = $request->phone;
            $profiles->country = $request->country;
            $profiles->address = $request->address;
            $profiles->bio = $request->bio;
            $profiles->foto = $FotoName;
        } else {
            $profiles->fullname = $request->fullname;
            $profiles->age = $request->age;
            $profiles->gender = $request->gender;
            $profiles->phone = $request->phone;
            $profiles->country = $request->country;
            $profiles->address = $request->address;
            $profiles->bio = $request->bio;
        }

        $profiles->update();

        Alert::success('Update', 'Profile data successfully updated');

        return redirect('/profile');
    }
}
