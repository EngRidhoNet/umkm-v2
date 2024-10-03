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

            switch ($user->role) {
                case 'mahasiswa':
                    return redirect()->route('mahasiswa.dashboard');
                case 'umkm':
                    return redirect()->route('umkm.dashboard');
                case 'superadmin':
                    return redirect()->route('superadmin.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Role tidak dikenali.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email atau password salah.');
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

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Store the profile and cover photos

            $fotoProfil = $request->file('foto_profil')->store('umkm/foto_profil', 'public');
            $fotoSampul = $request->file('foto_sampul')->store('umkm/foto_sampul', 'public');
            function renameFile($file, $prefix)
            {
                $extension = $file->getClientOriginalExtension();
                $newFileName = $prefix . '_' . time() . '.' . $extension;
                return $newFileName;
            }

            $fotoProfil = renameFile($request->file('foto_profil'), 'profil');
            $fotoSampul = renameFile($request->file('foto_sampul'), 'sampul');

            // Create User
            $user = User::create([
                'name' => $request->nama_umkm,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'umkm',
            ]);

            // Create UMKM profile linked to the User
            Umkm::create([
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
                // 'kelurahan' => $request->kelurahan,
                'kode_pos' => $request->kode_pos,
                // 'alamat' => $request->alamat,
                'informasi_pemilik' => $request->informasi_pemilik,
                'informasi_bisnis' => $request->informasi_bisnis,
            ]);

            return redirect()->route('login')->with('success', 'UMKM account created successfully');
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




// bakcup

  // public function postlogin(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     // Cek di tabel mahasiswa
    //     if ($this->attemptLogin(mahasiswa::class, $credentials)) {
    //         // dd(Auth::user());
    //         Log::info('User logged in as mahasiswa', ['email' => $credentials['email']]);
    //         return redirect()->intended('/mahasiswa');
    //     }

    //     // Cek di tabel superadmin
    //     if ($this->attemptLogin(superadmin::class, $credentials)) {
    //         Log::info('User logged in as superadmin', ['email' => $credentials['email']]);
    //         return redirect('/dashboard_superadmin');
    //     }

    //     // Cek di tabel umkm
    //     if ($this->attemptLogin(umkm::class, $credentials)) {
    //         Log::info('User logged in as umkm', ['email' => $credentials['email']]);
    //         return redirect('/dashboard_umkm');
    //     }

    //     // Jika tidak ditemukan di ketiga tabel, redirect ke halaman login
    //     Log::warning('Login failed', ['email' => $credentials['email']]);
    //     return redirect('/login')->withErrors(['email' => 'These credentials do not match our records.']);
    // }

    // private function attemptLogin($model, $credentials)
    // {
    //     // Ambil user berdasarkan email
    //     $user = $model::where('email', $credentials['email'])->first();
    //     // Cek apakah user ditemukan dan password cocok
    //     if ($user && Hash::check($credentials['password'], $user->password)) {
    //         // Log in user dengan session (menggunakan session-based authentication)
    //         Auth::login($user);

    //         // dd(Auth::check());

    //         return true;
    //     }
    //     return false;
    // }
