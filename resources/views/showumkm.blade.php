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

    <div class="product-section shadow-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 mb-5">
                    <div class="card">
                        {{-- <img src="{{ Storage::url('umkm/foto_sampul/' . $umkm->foto_sampul) }}" class="card-img-top"
                            alt="{{ $umkm->nama_umkm }}"> --}}
                        <div class="card-body">
                            <h3 class="card-title">{{ $umkm->nama_umkm }}</h3>
                            <p class="card-text">{{ $umkm->deskripsi }}</p>

                            <div class="card-text">
                                <h5>Informasi Bisnis</h5>
                                <p><strong>Kategori:</strong> {{ $umkm->kategori }}</p>
                                <p><strong>Alamat:</strong> {{ $umkm->alamat }}, {{ $umkm->kota }},
                                    {{ $umkm->provinsi }} {{ $umkm->kode_pos }}</p>
                                <p><strong>Informasi Pemilik:</strong> {{ $umkm->informasi_pemilik }}</p>
                                <p><strong>Informasi Bisnis:</strong> {{ $umkm->informasi_bisnis }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom profil UMKM -->
                <div class="col-md-12 col-lg-4 mb-5">
                    <div class="card">
                        <img src="{{ Storage::url('umkm/foto_profil/' . $umkm->foto_profil) }}" class="img-fluid"
                            alt="{{ $umkm->nama_umkm }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                            <p class="card-text">
                                <strong>Lokasi:</strong> {{ $umkm->kota }}, {{ $umkm->provinsi }}
                            </p>
                            <p class="card-text">
                                <strong>Kategori:</strong> {{ $umkm->kategori }}
                            </p>
                            <a href="{{ url('/umkm') }}" class="btn btn-secondary">Kembali ke Daftar UMKM</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
