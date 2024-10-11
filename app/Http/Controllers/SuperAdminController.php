<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use App\Models\User;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminController extends Controller
{
    public function indexMahasiswa()
    {
        $mahasiswa = mahasiswa::all();
        return view('superadmin.mahasiswa.index', compact('mahasiswa'));
    }

    public function chat(){
        return view('superadmin.chat.chat');
    }

    public function createMahasiswa()
    {
        return view('superadmin.mahasiswa.create');
    }

    public function showMahasiswa($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('superadmin.mahasiswa.show', compact('mahasiswa'));
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

            return redirect()->route('superadmin.mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Error in storeMahasiswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan mahasiswa');
        }
    }

    public function destroyMahasiswa($id)
    {
        try {
            $mahasiswa = mahasiswa::findOrFail($id);
            $mahasiswa->delete();
            $mahasiswa->user->delete();

            return redirect()->route('superadmin.mahasiswa')->with('success', 'Mahasiswa berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error in destroyMahasiswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus mahasiswa');
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

            return redirect()->route('superadmin.mahasiswa')->with('success', 'Mahasiswa berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error in updateMahasiswa: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui mahasiswa');
        }
    }

    // Manajemen data UMKM

    // Menampilkan data Umkm yang active
    public function indexUmkm()
    {

        $umkm = umkm::whereHas('user', function ($query) {
            $query->where('status', 'active');
        })->get();
        return view('superadmin.umkm.index', compact('umkm'));
    }

    public function verifikasiUmkm()
    {
        // Mendapatkan UMKM yang user-nya berstatus inactive
        $umkm = umkm::whereHas('user', function ($query) {
            $query->where('status', 'inactive');
        })->get();

        // Mengembalikan view beserta data UMKM yang tidak aktif
        return view('superadmin.verifikasi.index', compact('umkm'));
    }

    public function verify($id)
    {
        $umkm = umkm::findOrFail($id);
        $user = $umkm->user; // Ambil user terkait

        // Ubah status user menjadi active
        $user->status = 'active';
        $user->save();

        return redirect()->route('superadmin.verifikasi', $umkm->id)->with('success', 'UMKM berhasil diverifikasi dan status diubah menjadi active.');
    }

    public function tinjau($id)
    {
        // Mengambil data UMKM berdasarkan ID
        $umkm = umkm::findOrFail($id);

        // Mengirim data UMKM ke view untuk ditinjau
        return view('superadmin.verifikasi.tinjau', compact('umkm'));
    }

    public function createUmkm()
    {
        return view('superadmin.umkm.create');
    }

    public function showUmkm(Request $request, $id){
        $umkm = umkm::findOrFail($id);
        return view('superadmin.umkm.show', compact('umkm'));
    }

    public function storeUmkm(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'nama_umkm' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'alamat' => 'required|string',
                'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Foto Profil is optional
                'informasi_pemilik' => 'required|string',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Function to rename file and store it
            function renameAndStoreFile($file, $folder, $prefix)
            {
                // Generate a new file name
                $extension = $file->getClientOriginalExtension();
                $newFileName = $prefix . '_' . time() . '.' . $extension;

                // Store the file with the new name
                $file->storeAs($folder, $newFileName, 'public');

                return $newFileName;
            }

            // Handle optional profile photo upload
            $fotoProfil = $request->hasFile('foto_profil')
            ? renameAndStoreFile($request->file('foto_profil'), 'umkm/foto_profil', 'profil')
            : null; // Foto Profil is optional

            // Create User
            $user = User::create([
                'name' => $request->nama_umkm,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'umkm',
                'status' => 'active',
            ]);

            // Create UMKM profile linked to the User
            Umkm::create([
                'id_user' => $user->id,
                'nama_umkm' => $request->nama_umkm,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'foto_profil' => $fotoProfil, // Can be null if not uploaded
                'informasi_pemilik' => $request->informasi_pemilik,
            ]);

            return redirect()->route('superadmin.umkm')->with('success', 'UMKM account created successfully');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in registerumkm: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);

            // Return a JSON response with the error details
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ], 500);
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

    public function destroyUmkm($id)
    {
        try {
            $umkm = umkm::findOrFail($id);
            $umkm->delete();
            $umkm->user->delete();

            return redirect()->route('superadmin.umkm')->with('success', 'UMKM berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error in destroyUmkm: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menghapus UMKM');
        }
    }
}
