<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaan = Pekerjaan::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data pekerjaan',
            'data'    => $pekerjaan
        ], 200);
    }

    public function show($id)
    {
        $pekerjaan = Pekerjaan::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data pekerjaan',
            'data'    => $pekerjaan
        ], 200);
    }

    public function store(Request $request)
    {
        $pekerjaan = Pekerjaan::create([
            'id_umkm' => $request->id_umkm,
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'deskripsi' => $request->deskripsi,
            'gaji' => $request->gaji,
            'tanggal' => $request->tanggal,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data pekerjaan berhasil disimpan',
            'data'    => $pekerjaan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $pekerjaan = Pekerjaan::findOrfail($id);
        $pekerjaan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data pekerjaan berhasil diupdate',
            'data'    => $pekerjaan
        ], 200);
    }

    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrfail($id);
        $pekerjaan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data pekerjaan berhasil dihapus',
            'data'    => $pekerjaan
        ], 200);
    }
}
