@extends('layouts.admin.app')

@section('title', 'Dashboard POS UMKM')

@section('content')
<section class="section dashboard">
    <!-- Banner Section -->
    <div class="banner">
        <img src="{{ asset('images/banner-pos-umkm.jpg') }}" alt="POS UMKM Banner" class="img-fluid rounded">
        <div class="banner-text">
            <h1 class="fw-bold">POS UMKM</h1>
            <p class="lead">Menghubungkan Mahasiswa dengan UMKM untuk Meningkatkan Ekosistem Bisnis</p>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="row mt-4">
        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Penjualan <span>| Hari Ini</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash-stack text-primary"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>145 Transaksi</h6>
                                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">kenaikan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->

                <!-- UMKM Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card umkm-card">
                        <div class="card-body">
                            <h5 class="card-title">UMKM Terdaftar <span>| Total</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shop text-info"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>320 UMKM</h6>
                                    <span class="text-info small pt-1 fw-bold">30 UMKM</span> <span class="text-muted small pt-2 ps-1">baru</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End UMKM Card -->

                <!-- Mahasiswa Terlibat -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card students-card">
                        <div class="card-body">
                            <h5 class="card-title">Mahasiswa Terlibat <span>| Total</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-check text-success"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>540 Mahasiswa</h6>
                                    <span class="text-warning small pt-1 fw-bold">5% Kenaikan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Mahasiswa Terlibat -->
            </div>
        </div><!-- End Left side columns -->
    </div>
</section>

<style>
    .banner {
        position: relative;
        text-align: center;
        color: white;
    }

    .banner img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .banner-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .info-card {
        background-color: #f8f9fa;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .info-card .card-icon {
        background-color: #fff;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .sales-card .card-icon {
        background-color: #ff6f61;
    }

    .umkm-card .card-icon {
        background-color: #4caf50;
    }

    .students-card .card-icon {
        background-color: #2196f3;
    }
</style>
@endsection
