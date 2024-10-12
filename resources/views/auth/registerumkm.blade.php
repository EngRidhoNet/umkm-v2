<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-r from-[#0DBDE5] to-[#2DB08B] text-blue-900">
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
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="space-y-4" action="{{ route('umkmregister') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Email -->
                        <div class="w-full pt-4">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required>
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="w-full pt-4">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="••••••••" required>
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama UMKM -->
                        <div class="w-full pt-4">
                            <label for="nama_umkm"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama UMKM</label>
                            <input type="text" name="nama_umkm" id="nama_umkm"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                        </div>

                        <!-- Informasi Pemilik -->
                        <div class="w-full pt-4">
                            <label for="informasi_pemilik"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Pemilik UMKM
                            </label>
                            <textarea name="informasi_pemilik" id="informasi_pemilik" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required></textarea>
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



                        <!-- Foto Profil -->
                        <div class="w-full pt-4">
                            <label for="foto_profil"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Profil
                                (Opsional)</label>
                            <input type="file" name="foto_profil" id="foto_profil" accept="image/*"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="w-full pt-4">
                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-600 transition duration-300 ease-in-out transform hover:scale-105 active:scale-95 border border-gray-300">
                                Daftar UMKM
                            </button>

                        </div>

                        <div class="w-full pt-4">
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Sudah Punya Akun? <a href="{{ route('login') }}"
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login
                                    Disini</a>
                            </p>
                        </div>

                    </div>


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

        let selectedProvinceName = ''; // Variable to store the selected province name
        let selectedKotaName = ''; // Variable to store the selected city name
        let selectedKecamatanName = ''; // Variable to store the selected district name

        // Load provinces
        fetch('/api/provinces')
            .then(response => response.json())
            .then(data => {
                provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                data.forEach(province => {
                    provinsiSelect.innerHTML +=
                        `<option value="${province.name}" data-id="${province.id}">${province.name}</option>`;
                });
            });

        // Load cities (regencies) based on selected province
        provinsiSelect.addEventListener('change', function() {
            const provinceId = provinsiSelect.options[provinsiSelect.selectedIndex].getAttribute(
                'data-id');
            selectedProvinceName = this.value; // Store selected province name
            if (provinceId) {
                fetch(`/api/regencies/${provinceId}`)
                    .then(response => response.json())
                    .then(data => {
                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
                        data.forEach(regency => {
                            kotaSelect.innerHTML +=
                                `<option value="${regency.name}" data-id="${regency.id}">${regency.name}</option>`;
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
            const regencyId = kotaSelect.options[kotaSelect.selectedIndex].getAttribute('data-id');
            selectedKotaName = this.value; // Store selected city name
            if (regencyId) {
                fetch(`/api/districts/${regencyId}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        data.forEach(district => {
                            kecamatanSelect.innerHTML +=
                                `<option value="${district.name}" data-id="${district.id}">${district.name}</option>`;
                        });
                    });
            } else {
                kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
            }
        });

        // Store selected district name
        kecamatanSelect.addEventListener('change', function() {
            selectedKecamatanName = this.value;
        });

        // Assuming you have a form submission or some event where you send the data
        document.getElementById('submit-button').addEventListener('click', function() {
            const formData = {
                province_name: selectedProvinceName,
                city_name: selectedKotaName,
                district_name: selectedKecamatanName
            };

            // Now you can send formData to your server via fetch or AJAX
            console.log(formData); // This is where you'd actually send the data to your server
        });
    });
</script>

</html>
