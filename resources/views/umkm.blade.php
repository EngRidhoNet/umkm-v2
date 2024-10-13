<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
        .card-img-top {
            width: 50px;
            margin-top: 15px;
        }

        .card-body {
            padding: 10px;
        }

        .card-title {
            font-size: 14px;
            font-weight: bold;
        }

        .my-section {
            position: relative;
            top: -50px;
            /* Sesuaikan nilai ini untuk memposisikan elemen lebih dekat ke bagian biru */
            z-index: 10;
            /* Pastikan elemen ini berada di atas konten lainnya */
        }

        .cards {
            padding: 0%;
        }

        .custom-gradient {
            /* Background linear gradient */
            background: linear-gradient(to right, #0dbde6, #2eaf88);
            height: 100vh;
            /* Full page height */
        }

        .content {
            color: white;
            text-align: center;
            padding-top: 100px;
        }
    </style>

    <title>Pos UMKM</title>
</head>

<body>
    @include('layouts.header')
    <div class="product-section shadow-lg py-5">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Kolom deskripsi -->
                <div class="col-md-12 col-lg-8 text-center mb-4">
                    <h2 class="mb-3 section-title">Lebih Dari {{ $umkms->total() }} UMKM Tersedia</h2>
                    <p class="mb-4">UMKM Kami tersedia di seluruh karesidenan Malang Raya. Jelajahi UMKM pilihan Anda.
                    </p>
                </div>

                <!-- Search form -->
                <div class="col-md-8 mb-4">
                    <form action="{{ route('umkm.index.beranda') }}" method="GET"
                        class="form-inline d-flex justify-content-center">
                        <div class="input-group w-100">
                            <input type="text" name="search" class="form-control" placeholder="Cari UMKM..."
                                value="{{ $search ?? '' }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary ml-2" type="submit">Cari</button>
                                <!-- Tambahkan class ml-2 untuk margin -->
                            </div>
                        </div>
                    </form>
                </div>


                <!-- Menampilkan semua UMKM dalam list card vertikal -->
                @foreach ($umkms as $umkm)
                    <div class="col-12 col-md-8 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="row no-gutters">
                                <!-- Bagian gambar -->
                                <div class="col-md-4">
                                    <img src="{{ Storage::url('umkm/foto_profil/' . $umkm->foto_profil) }}"
                                        class="img-fluid h-100" alt="{{ $umkm->nama_umkm }}" style="object-fit: cover;">
                                </div>

                                <!-- Bagian teks -->
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                                            <p class="card-text text-muted">
                                                {{ \Illuminate\Support\Str::limit($umkm->deskripsi, 100) }}</p>
                                        </div>
                                        <div>
                                            <p class="card-text">
                                                <small class="text-muted">{{ $umkm->kota }},
                                                    {{ $umkm->provinsi }}</small>
                                            </p>
                                            <a href="{{ route('umkm.show', $umkm->id) }}"
                                                class="btn btn-primary btn-sm">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="col-12 d-flex justify-content-center">
                    {{ $umkms->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
