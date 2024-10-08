<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MahasiswaCheck;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\SuperAdminController;

// Api
Route::get('/api/provinces', function () {
    return File::get(public_path('api_daerah/provinces.json'));
});

Route::get('/api/regencies/{province_id}', function ($province_id) {
    $data = json_decode(File::get(public_path('api_daerah/regencies.json')), true);
    return collect($data)->where('province_id', $province_id)->values();
});

Route::get('/api/districts/{regency_id}', function ($regency_id) {
    $data = json_decode(File::get(public_path('api_daerah/districts.json')), true);
    return collect($data)->where('regency_id', $regency_id)->values();
});



// Middleware untuk mahasiswa
Route::middleware(['auth', RoleMiddleware::class . ':mahasiswa'])->group(function () {
    Route::get('/mahasiswa', function () {
        return view('mahasiswa.index');
    })->name('mahasiswa.dashboard');
});

// Middleware untuk umkm
Route::middleware(['auth', RoleMiddleware::class . ':umkm'])->group(function () {
    // Route untuk UMKM
    Route::get('/umkm', [UmkmController::class, 'index'])->name('umkm.index');

    // Route untuk Artikel
    Route::get('/umkm/artikel', [UmkmController::class, 'indexArtikel'])->name('umkm.artikel.index');
    Route::get('/umkm/artikel/create', [UmkmController::class, 'createArtikel'])->name('umkm.artikel.create');
    Route::post('/umkm/artikel', [UmkmController::class, 'storeArtikel'])->name('umkm.artikel.store');
    Route::get('/umkm/artikel/{id}', [UmkmController::class, 'showArtikel'])->name('umkm.artikel.show');
    Route::get('/umkm/artikel/{id}/edit', [UmkmController::class, 'editArtikel'])->name('umkm.artikel.edit');
    Route::put('/umkm/artikel/{id}', [UmkmController::class, 'updateArtikel'])->name('umkm.artikel.update');
    Route::delete('/umkm/artikel/{id}', [UmkmController::class, 'destroyArtikel'])->name('umkm.artikel.destroy');

    // konsultasi
    Route::get('/umkm/konsultasi', [KonsultasiController::class, 'index'])->name('umkm.konsultasi.index');
    Route::get('/umkm/konsultasi/create', [KonsultasiController::class, 'create'])->name('umkm.konsultasi.create');
    Route::post('/umkm/konsultasi', [KonsultasiController::class, 'store'])->name('umkm.konsultasi.store');
    Route::get('/umkm/konsultasi/{id}', [KonsultasiController::class, 'show'])->name('umkm.konsultasi.show');
    Route::get('/umkm/konsultasi/{id}/edit', [KonsultasiController::class, 'edit'])->name('umkm.konsultasi.edit');
    Route::put('/umkm/konsultasi/{id}', [KonsultasiController::class, 'update'])->name('umkm.konsultasi.update');
    Route::delete('/umkm/konsultasi/{id}', [KonsultasiController::class, 'destroy'])->name('umkm.konsultasi.destroy');





    // Route untuk Pekerjaan
    Route::get('/umkm/pekerjaan', [PekerjaanController::class, 'index'])->name('umkm.pekerjaan.index');
    Route::get('/umkm/pekerjaan/create', [PekerjaanController::class, 'create'])->name('umkm.pekerjaan.create');
    Route::post('/umkm/pekerjaan', [PekerjaanController::class, 'store'])->name('umkm.pekerjaan.store');
    Route::get('/umkm/pekerjaan/{id}', [PekerjaanController::class, 'show'])->name('umkm.pekerjaan.show');
    Route::get('/umkm/pekerjaan/{id}/edit', [PekerjaanController::class, 'edit'])->name('umkm.pekerjaan.edit');
    Route::put('/umkm/pekerjaan/{id}', [PekerjaanController::class, 'update'])->name('umkm.pekerjaan.update');
    Route::delete('/umkm/pekerjaan/{id}', [PekerjaanController::class, 'destroy'])->name('umkm.pekerjaan.destroy');

});

// Middleware untuk superadmin
Route::middleware(['auth', RoleMiddleware::class . ':superadmin'])->group(function () {
    Route::get('/superadmin', function () {
        return view('superadmin.index');
    })->name('superadmin.dashboard');
// mahasiswa
    Route::get('/superadmin/mahasiswa', [SuperadminController::class, 'indexMahasiswa'])->name('superadmin.mahasiswa');
    Route::get('/superadmin/mahasiswa/create', [SuperadminController::class, 'createMahasiswa'])->name('superadmin.mahasiswa.create');
    Route::post('/superadmin/mahasiswa', [SuperadminController::class, 'storeMahasiswa'])->name('superadmin.mahasiswa.store');
    Route::get('/superadmin/mahasiswa/{id}', [SuperadminController::class, 'showMahasiswa'])->name('superadmin.mahasiswa.show');
    Route::get('/superadmin/mahasiswa/{id}/edit', [SuperadminController::class, 'editMahasiswa'])->name('superadmin.mahasiswa.edit');
    Route::put('/superadmin/mahasiswa/{id}', [SuperadminController::class, 'updateMahasiswa'])->name('superadmin.mahasiswa.update');
    Route::delete('/superadmin/mahasiswa/{id}', [SuperadminController::class, 'destroyMahasiswa'])->name('superadmin.mahasiswa.destroy');
    // umkm
    Route::get('/superadmin/umkm', [SuperadminController::class, 'indexUmkm'])->name('superadmin.umkm');
    Route::get('/superadmin/umkm/create', [SuperadminController::class, 'createUmkm'])->name('superadmin.umkm.create');
    Route::post('/superadmin/umkm', [SuperadminController::class, 'storeUmkm'])->name('superadmin.umkm.store');
    Route::get('/superadmin/umkm/{id}', [SuperadminController::class, 'showUmkm'])->name('superadmin.umkm.show');
    Route::get('/superadmin/umkm/{id}/edit', [SuperadminController::class, 'editUmkm'])->name('superadmin.umkm.edit');
    Route::put('/superadmin/umkm/{id}', [SuperadminController::class, 'updateUmkm'])->name('superadmin.umkm.update');
    Route::delete('/superadmin/umkm/{id}', [SuperadminController::class, 'destroyUmkm'])->name('superadmin.umkm.destroy');
    Route::get('/superadmin/verifikasi', [SuperAdminController::class, 'verifikasiUmkm'])->name('superadmin.verifikasi');
    Route::put('/superadmin/umkm/{id}/verify', [SuperAdminController::class, 'verify'])->name('superadmin.umkm.verify');
    Route::get('/superadmin/umkm/tinjau/{id}',[SuperAdminController::class, 'tinjau'])->name('superadmin.umkm.tinjau');

    // konsultasi
    Route::get('/superadmin/konsultasi', [KonsultasiController::class, 'indexall'])->name('superadmin.konsultasi');
    Route::get('/superadmin/konsultasi/{id}', [KonsultasiController::class, 'showadmin'])->name('superadmin.konsultasi.show');
    Route::put('/konsultasi/{id}/jawaban', [KonsultasiController::class, 'updateJawaban'])->name('superadmin.konsultasi.updateJawaban');



});



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);


Route::get('/', function () {
    return view('index');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/registerumkm', function () {
    return view('auth.registerumkm');
})->name('registerumkm');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/postregister', [AuthController::class, 'postregister'])->name('postregister');
Route::post('/registermahasiswa', [AuthController::class, 'registermahasiswa'])->name('registermahasiswa');
Route::post('/registerumkm', [AuthController::class, 'registerumkm'])->name('umkmregister');
