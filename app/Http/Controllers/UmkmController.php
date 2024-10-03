<?php

namespace App\Http\Controllers;
use App\Models\umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $umkm = umkm::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data umkm',
            'data'    => $umkm
        ], 200);
    }

    public function show($id)
    {
        $umkm = umkm::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data umkm',
            'data'    => $umkm
        ], 200);
    }

    public function store(Request $request)
    {
        $umkm = umkm::create([
            'id_user' => $request->id_user,
            'nama_umkm' => $request->nama_umkm,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'maps' => $request->maps,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data umkm berhasil disimpan',
            'data'    => $umkm
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $umkm = umkm::findOrfail($id);
        $umkm->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data umkm berhasil diupdate',
            'data'    => $umkm
        ], 200);
    }

    public function destroy($id)
    {
        $umkm = umkm::findOrfail($id);
        $umkm->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data umkm berhasil dihapus',
            'data'    => $umkm
        ], 200);
    }
}
