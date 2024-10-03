<?php

namespace App\Http\Controllers;
use App\Models\Apply;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function index()
    {
        $apply = Apply::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data apply',
            'data'    => $apply
        ], 200);
    }

    public function show($id)
    {
        $apply = Apply::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data apply',
            'data'    => $apply
        ], 200);
    }

    public function store(Request $request)
    {
        $apply = Apply::create([
            'id_mahasiswa' => $request->id_mahasiswa,
            'id_umkm' => $request->id_umkm,
            'id_artikel' => $request->id_artikel,
            'status' => $request->status,
            'dokumen' => $request->dokumen,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data apply berhasil disimpan',
            'data'    => $apply
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $apply = Apply::findOrfail($id);
        $apply->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data apply berhasil diupdate',
            'data'    => $apply
        ], 200);
    }

    public function destroy($id)
    {
        $apply = Apply::findOrfail($id);
        $apply->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data apply berhasil dihapus',
            'data'    => $apply
        ], 200);
    }
}
