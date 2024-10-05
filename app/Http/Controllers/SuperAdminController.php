<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use App\Models\User;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
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
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'universitas' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:20',
            'penghasilan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'alamat' => 'required|string|max:255',
        ]);

        try {
            // Store the profile picture
            $fileName = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->move(public_path('uploads/mahasiswa'), $fileName);

            // Create User
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'mahasiswa',
            ]);

            // Create Mahasiswa profile
            mahasiswa::create([
                'id_user' => $user->id,
                'nama_mahasiswa' => $request->nama,
                'universitas' => $request->universitas,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_hp' => $request->no_hp,
                'penghasilan' => $request->penghasilan,
                'pekerjaan' => $request->pekerjaan,
                'foto_profil' => $fileName,
                'provinsi_mahasiswa' => $request->provinsi,
                'kota_mahasiswa' => $request->kota,
                'kecamatan_mahasiswa' => $request->kecamatan,
                'kode_pos' => $request->kode_pos,
                'alamat_mahasiswa' => $request->alamat,
            ]);

            return redirect()->route('superadmin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Error in storeMahasiswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan mahasiswa');
        }
    }

    public function editMahasiswa($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('superadmin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string',
            'universitas' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'required|string|max:20',
            'penghasilan' => 'required|string',
            'pekerjaan' => 'required|string|max:255',
            'foto_profil' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'alamat' => 'required|string|max:255',
        ]);

        try {
            $mahasiswa = mahasiswa::findOrFail($id);

            if ($request->hasFile('foto_profil')) {
                $fileName = time() . '.' . $request->foto_profil->extension();
                $request->foto_profil->move(public_path('uploads/mahasiswa'), $fileName);
                $mahasiswa->foto_profil = $fileName;
            }

            $mahasiswa->update($request->all());

            if ($request->filled('password')) {
                $mahasiswa->user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return redirect()->route('superadmin.mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error in updateMahasiswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui mahasiswa');
        }
    }

    // Manajemen data UMKM
    public function indexUmkm()
    {
        $umkm = umkm::all();
        return view('superadmin.umkm.index', compact('umkm'));
    }

    public function createUmkm()
    {
        return view('superadmin.umkm.create');
    }

    public function storeUmkm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'nama_umkm' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kategori' => 'required|string',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string',
            'informasi_pemilik' => 'required|string',
            'informasi_bisnis' => 'required|string',
        ]);

        try {
            $fotoProfil = $request->file('foto_profil')->store('umkm/foto_profil', 'public');
            $fotoSampul = $request->file('foto_sampul')->store('umkm/foto_sampul', 'public');

            // Create User
            $user = User::create([
                'name' => $request->nama_umkm,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'umkm',
            ]);

            // Create UMKM profile
            umkm::create([
                'id_user' => $user->id,
                'nama_umkm' => $request->nama_umkm,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'kategori' => $request->kategori,
                'foto_profil' => $fotoProfil,
                'foto_sampul' => $fotoSampul,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'kode_pos' => $request->kode_pos,
                'informasi_pemilik' => $request->informasi_pemilik,
                'informasi_bisnis' => $request->informasi_bisnis,
            ]);

            return redirect()->route('superadmin.umkm.index')->with('success', 'UMKM berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Error in storeUmkm: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan UMKM');
        }
    }

    public function editUmkm($id)
    {
        $umkm = umkm::findOrFail($id);
        return view('superadmin.umkm.edit', compact('umkm'));
    }

    public function updateUmkm(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string',
            'nama_umkm' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kategori' => 'required|string',
            'foto_profil' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto_sampul' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kode_pos' => 'required|string',
            'informasi_pemilik' => 'required|string',
            'informasi_bisnis' => 'required|string',
        ]);

        try {
            $umkm = umkm::findOrFail($id);

            if ($request->hasFile('foto_profil')) {
                $fotoProfil = $request->file('foto_profil')->store('umkm/foto_profil', 'public');
                $umkm->foto_profil = $fotoProfil;
            }

            if ($request->hasFile('foto_sampul')) {
                $fotoSampul = $request->file('foto_sampul')->store('umkm/foto_sampul', 'public');
                $umkm->foto_sampul = $fotoSampul;
            }

            $umkm->update($request->all());

            if ($request->filled('password')) {
                $umkm->user->update([
                    'password' => Hash::make($request->password)
                ]);
            }

            return redirect()->route('superadmin.umkm.index')->with('success', 'UMKM berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error in updateUmkm: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui UMKM');
        }
    }
}
