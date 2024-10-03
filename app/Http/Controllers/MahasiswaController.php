<?php

namespace App\Http\Controllers;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = mahasiswa::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data mahasiswa',
            'data'    => $mahasiswa
        ], 200);
    }

    public function show($id)
    {
        $mahasiswa = mahasiswa::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data mahasiswa',
            'data'    => $mahasiswa
        ], 200);
    }

    public function store(Request $request)
    {
        $mahasiswa = mahasiswa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'universitas' => $request->universitas,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'penghasilan' => $request->penghasilan,
            'pekerjaan' => $request->pekerjaan,
            'foto_profil' => $request->foto_profil,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'kode_pos' => $request->kode_pos,
            'alamat' => $request->alamat,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil disimpan',
            'data'    => $mahasiswa
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = mahasiswa::findOrfail($id);
        $mahasiswa->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil diupdate',
            'data' => $mahasiswa
        ], 200);
    }

    public function destroy($id)
    {
        $mahasiswa = mahasiswa::findOrfail($id);
        $mahasiswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil dihapus',
            'data' => $mahasiswa
        ], 200);
        }
}
