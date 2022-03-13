<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # mengambil data dari tabel role
        $roles = Role::latest()->get();

        # memberikan respon dalam bentuk JSON
        # dengan status code 200 yang artinya berhasil
        return response()->json([
            'success' => true,
            'message' => 'Get All Role',
            'data'    => $roles
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
            'name'   => 'required'
        ]);

        # membuat kondisi jika ada salah satu
        # attribute data yang kosong, dan
        # memberikan respon dalam bentuk JSON
        # status code 400 artinya kesalahan saat validasi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        # menyimpan data ke database
        $role = Role::create([
            'name'  => $request->name
        ]);

        # memberikan response message jika
        # data berhasil disimpan ke db, dan
        # memberikan response status code 201
        if ($role) {

            return response()->json([
                'success' => true,
                'message' => 'Role is added successfully',
                'data'    => $role
            ], 201);
        }

        # gagal menyimpan data ke database
        return response()->json([
            'success' => false,
            'message' => 'Role failed to save',
        ], 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        # mencari data role sesuai id nya
        $roles = Role::findOrfail($role);

        # memberikan respon dalam bentuk JSON
        return response()->json([
            'success' => true,
            'message' => 'Get Detail Role',
            'data'    => $roles
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        # membuat validasi
        $validator = Validator::make($request->all(), [
            'name'   => 'required'
        ]);

        # membuat kondisi jika ada salah satu
        # attribute data yang kosong, dan
        # memberikan respon dalam bentuk JSON
        # status code 400 artinya kesalahan saat validasi
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        # mencari data role sesuai id nya
        $roles = Role::findOrFail($role->id);

        if ($roles) {

            # meng-update data role
            $roles->update([
                'name'     => $request->name
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Role is update successfully',
                'data'    => $roles
            ], 200);
        }

        # kesalahan dalam mengupdate data
        # maka akan muncul status code 404
        return response()->json([
            'success' => false,
            'message' => 'Role not found',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        # mencari data role sesuai id
        $roles = Role::findOrfail($role->id);

        if ($roles) {

            # meng-hapus data role
            $roles->delete();

            return response()->json([
                'success' => true,
                'message' => 'Role is delete successfully',
            ], 200);
        }

        # kesalahan dalam mengupdate data
        # maka akan muncul status code 404
        return response()->json([
            'success' => false,
            'message' => 'Role not found',
        ], 404);
    }
}
