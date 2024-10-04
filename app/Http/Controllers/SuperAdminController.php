<?php

namespace App\Http\Controllers;
use App\Models\umkm;
use App\Models\User;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    // Manajemen data mahasiswa
    public function indexMahasiswa()
    {
        $mahasiswa = mahasiswa::all();
        return view('superadmin.mahasiswa.index', compact('mahasiswa'));
    }

    public function createMahasiswa()
    {
        return view('superadmin.mahasiswa.create');
    }

    public function storeMahasiswa(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'universitas' => 'required',
            // validasi lainnya...
        ]);

        mahasiswa::create($request->all());
        return redirect()->route('superadmin.mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan');
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('superadmin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'universitas' => 'required',
            // validasi lainnya...
        ]);

        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect()->route('superadmin.mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diupdate');
    }

    public function deleteMahasiswa($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('superadmin.mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus');
    }

    // Manajemen data UMKM
    public function indexUmkm()
    {
        $umkm = umkm::all();
        return view('superadmin.umkm.index', compact('umkm'));
    }

    public function createumkm()
    {
        return view('superadmin.umkm.create');
    }

    public function storeumkm(Request $request)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'deskripsi' => 'required',
            // validasi lainnya...
        ]);

        umkm::create($request->all());
        return redirect()->route('superadmin.umkm.index')->with('success', 'Data UMKM berhasil ditambahkan');
    }

    public function editumkm($id)
    {
        $umkm = umkm::findOrFail($id);
        return view('superadmin.umkm.edit', compact('umkm'));
    }

    public function updateumkm(Request $request, $id)
    {
        $request->validate([
            'nama_umkm' => 'required',
            'deskripsi' => 'required',
            // validasi lainnya...
        ]);

        $umkm = umkm::findOrFail($id);
        $umkm->update($request->all());
        return redirect()->route('superadmin.umkm.index')->with('success', 'Data UMKM berhasil diupdate');
    }

    public function deleteumkm($id)
    {
        $umkm = umkm::findOrFail($id);
        $umkm->delete();
        return redirect()->route('superadmin.umkm.index')->with('success', 'Data UMKM berhasil dihapus');
    }   
    // Metode serupa untuk create, store, edit, update, dan delete untuk data UMKM


}
