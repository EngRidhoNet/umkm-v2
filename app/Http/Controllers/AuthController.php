<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use App\Models\User;
use App\Models\mahasiswa;
use App\Models\superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek apakah user statusnya 'active'
            if ($user->status !== 'active') {
                Auth::logout(); // Logout jika status tidak aktif
                return redirect()->route('login')->with('error', 'Akun anda sedang dalam verifikasi.')->withInput();
            }

            // Redirect berdasarkan role pengguna
            switch ($user->role) {
                case 'mahasiswa':
                    return redirect()->route('mahasiswa.dashboard');
                case 'umkm':
                    return redirect()->route('umkm.index');
                case 'superadmin':
                    return redirect()->route('superadmin.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Role tidak dikenali.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email atau password salah.')->withInput();
        }
    }

    public function registermahasiswa(Request $request)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
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

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Store the profile picture
            $fileName = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->move(public_path('uploads/mahasiswa'), $fileName);

            // Create a new user
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'mahasiswa',  // Set default role to mahasiswa
            ]);

            // Create a new Mahasiswa record
            Mahasiswa::create([
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
                'kelurahan_mahasiswa' => $request->kelurahan ?? '',
                'kode_pos' => $request->kode_pos,
                'alamat_mahasiswa' => $request->alamat,
            ]);

            // Redirect to a success page
            return redirect()->route('login')->with('success', 'Akun berhasil dibuat!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in registermahasiswa: ' . $e->getMessage(), [
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


    public function registerumkm(Request $request)
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
                'status' => 'inactive',
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

            return redirect()->route('login')->with('success', 'Akun anda sedang dalam verifikasi.');
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


    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}



