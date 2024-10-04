<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-blue-200 via-blue-300 to-blue-500 text-blue-900">
    <div class="flex flex-col items-center justify-center min-h-screen p-4 sm:p-6 lg:p-8">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            POS UMKM
        </a>
        <div class="w-full max-w-4xl bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 sm:p-6 md:p-8 space-y-4">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Buat Akun UMKM
                </h1>
                <form class="space-y-4" action="{{ route('umkmregister') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Email -->
                        <div class="w-full pt-4">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required>
                        </div>

                        <!-- Password -->
                        <div class="w-full pt-4">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <!-- Nama UMKM -->
                        <div class="w-full pt-4">
                            <label for="nama_umkm"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama UMKM</label>
                            <input type="text" name="nama_umkm" id="nama_umkm"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <div class="w-full pt-4">
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input type="text" name="alamat" id="alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="w-full pt-4">
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required></textarea>
                        </div>

                        <!-- Kategori -->
                        <div class="w-full pt-4">
                            <label for="kategori"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                            <input type="text" name="kategori" id="kategori"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <!-- Foto Profil -->
                        <div class="w-full pt-4">
                            <label for="foto_profil"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Profil</label>
                            <input type="file" name="foto_profil" id="foto_profil" accept="image/*"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <!-- Foto Sampul -->
                        <div class="w-full pt-4">
                            <label for="foto_sampul"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Sampul</label>
                            <input type="file" name="foto_sampul" id="foto_sampul" accept="image/*"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <div class="w-full pt-4">
                            <label for="provinsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                            <select name="provinsi" id="provinsi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">Pilih Provinsi</option>
                            </select>
                        </div>
                        <!-- Kota Select -->
                        <div class="w-full pt-4">
                            <label for="kota"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                            <select name="kota" id="kota"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>
                        <!-- Kecamatan Select -->
                        <div class="w-full pt-4">
                            <label for="kecamatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>

                        <!-- Kode Pos -->
                        <div class="w-full pt-4">
                            <label for="kode_pos"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pos</label>
                            <input type="text" name="kode_pos" id="kode_pos"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <!-- Informasi Pemilik -->
                        <div class="w-full pt-4">
                            <label for="informasi_pemilik"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Informasi Pemilik
                            </label>
                            <textarea name="informasi_pemilik" id="informasi_pemilik" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required></textarea>
                        </div>

                        <!-- Informasi Bisnis -->
                        <div class="w-full pt-4">
                            <label for="informasi_bisnis"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Informasi
                                Bisnis</label>
                            <textarea name="informasi_bisnis" id="informasi_bisnis" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Daftar
                        UMKM</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const provinsiSelect = document.getElementById('provinsi');
        const kotaSelect = document.getElementById('kota');
        const kecamatanSelect = document.getElementById('kecamatan');

        // Load provinces
        fetch('/api/provinces')
            .then(response => response.json())
            .then(data => {
                provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                data.forEach(province => {
                    provinsiSelect.innerHTML +=
                        `<option value="${province.id}">${province.name}</option>`;
                });
            });

        // Load cities (regencies) based on selected province
        provinsiSelect.addEventListener('change', function() {
            const provinceId = this.value;
            if (provinceId) {
                fetch(`/api/regencies/${provinceId}`)
                    .then(response => response.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        data.forEach(regency => {
                            kotaSelect.innerHTML +=
                                `<option value="${regency.id}">${regency.name}</option>`;
                        });
                        kecamatanSelect.innerHTML =
                        '<option value="">Pilih Kecamatan</option>'; // Reset kecamatan
                    });
            } else {
                kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });

        // Load districts based on selected city (regency)
        kotaSelect.addEventListener('change', function() {
            const regencyId = this.value;
            if (regencyId) {
                fetch(`/api/districts/${regencyId}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(district => {
                            kecamatanSelect.innerHTML +=
                                `<option value="${district.id}">${district.name}</option>`;
                        });
                    });
            } else {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });
    });
</script>

</html>
