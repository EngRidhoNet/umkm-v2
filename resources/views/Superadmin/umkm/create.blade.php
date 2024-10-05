@extends('layouts.admin.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <div class="min-h-screen flex items-center justify-center ">
    <div class="w-full max-w-4xl bg-white p-8 shadow-lg rounded-lg">
        <form action="/registerumkm" method="POST" enctype="multipart/form-data" class="space-y-6">
            <h2 class="text-3xl font-bold text-center text-blue-600 mb-8">UMKM Registration</h2>

            <!-- Email -->
            <div class="flex flex-col">
                <label for="email" class="text-gray-700 font-bold">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Password -->
            <div class="flex flex-col">
                <label for="password" class="text-gray-700 font-bold">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Nama UMKM -->
            <div class="flex flex-col">
                <label for="nama_umkm" class="text-gray-700 font-bold">Nama UMKM</label>
                <input type="text" id="nama_umkm" name="nama_umkm" required maxlength="255"
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Deskripsi -->
            <div class="flex flex-col">
                <label for="deskripsi" class="text-gray-700 font-bold">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <!-- Alamat -->
            <div class="flex flex-col">
                <label for="alamat" class="text-gray-700 font-bold">Alamat</label>
                <input type="text" id="alamat" name="alamat" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Kategori -->
            <div class="flex flex-col">
                <label for="kategori" class="text-gray-700 font-bold">Kategori</label>
                <input type="text" id="kategori" name="kategori" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Foto Profil -->
            <div class="flex flex-col">
                <label for="foto_profil" class="text-gray-700 font-bold">Foto Profil</label>
                <input type="file" id="foto_profil" name="foto_profil" accept="image/jpeg, image/png" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Foto Sampul -->
            <div class="flex flex-col">
                <label for="foto_sampul" class="text-gray-700 font-bold">Foto Sampul</label>
                <input type="file" id="foto_sampul" name="foto_sampul" accept="image/jpeg, image/png" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Provinsi -->
            <div class="flex flex-col">
                <label for="provinsi" class="text-gray-700 font-bold">Provinsi</label>
                <input type="text" id="provinsi" name="provinsi" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Kota -->
            <div class="flex flex-col">
                <label for="kota" class="text-gray-700 font-bold">Kota</label>
                <input type="text" id="kota" name="kota" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Kecamatan -->
            <div class="flex flex-col">
                <label for="kecamatan" class="text-gray-700 font-bold">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Kode Pos -->
            <div class="flex flex-col">
                <label for="kode_pos" class="text-gray-700 font-bold">Kode Pos</label>
                <input type="text" id="kode_pos" name="kode_pos" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500">
            </div>

            <!-- Informasi Pemilik -->
            <div class="flex flex-col">
                <label for="informasi_pemilik" class="text-gray-700 font-bold">Informasi Pemilik</label>
                <textarea id="informasi_pemilik" name="informasi_pemilik" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <!-- Informasi Bisnis -->
            <div class="flex flex-col">
                <label for="informasi_bisnis" class="text-gray-700 font-bold">Informasi Bisnis</label>
                <textarea id="informasi_bisnis" name="informasi_bisnis" required
                    class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 text-white py-3 px-8 rounded-lg hover:bg-blue-700 focus:outline-none">Register</button>
            </div>
        </form>
    </div>
</div>

@endsection
