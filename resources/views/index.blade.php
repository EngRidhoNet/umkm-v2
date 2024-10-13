@include('layouts.header')
<style>
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .card {
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .hero {
        background: linear-gradient(135deg, #0DBDE5, #2DB08B);
        padding: 80px 0;
    }

    .intro-excerpt {
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        /* border-radius: 10px; */
    }

    .feature-section {
        padding: 80px 0;
    }

    .blog-section {
        background-color: #f8f9fa;
        padding: 80px 0;
    }

    .post-entry {
        transition: box-shadow 0.3s ease-in-out;
    }

    .post-entry:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    @keyframes gradientBG {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .intro-excerpt {
        background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        color: #fff;
        padding: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .intro-excerpt::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 50%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .intro-excerpt:hover::after {
        opacity: 1;
    }

    /* ... rest of your existing styles ... */
</style>

<div class="hero intro-excerpt" id="dynamic-bg">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 fade-in">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('images/banner 2.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('images/banner1.jpg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('images/banner 2.jpg') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
            <div class="col-lg-5 fade-in">
                <div class="intro-excerpt" id="dynamic-bg">
                    <h1 class="title-animate">Pos<span class="d-block">UMKM</span></h1>
                    <p class="mb-4 text-justify">POSUMKM adalah sebuah bisnis sociopreneurship yang berfokus pada
                        pemberdayaan pendidikan dan pertumbuhan UMKM. Kami menghubungkan mahasiswa, dosen, dan pelaku
                        usaha menengah ke bawah untuk menciptakan solusi inovatif yang menjawab tantangan nyata yang
                        dihadapi oleh UMKM.</p>
                    <p>
                        {{-- <a href="{{ route('mahasiswa.pekerjaan') }}" class="btn btn-primary me-2 btn-animate">Apply
                            Lowongan</a>
                        <a href="#" class="btn btn-outline-light btn-animate">Berita</a> --}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="feature-section">
    <div class="container">
        <div class="row text-center">
            <!-- Feature cards remain the same, but now they'll animate on scroll -->
            @foreach (['umkm', 'konsultasi', 'informasi', 'chat', 'blog', 'kontak'] as $feature)
                <div class="col-6 col-md-4 col-lg-2 mb-3 fade-in">
                    <div class="card shadow-sm p-3 bg-white rounded-lg h-100">
                        <img src="{{ asset('images/' . $feature . '.png') }}" class="card-img-top mx-auto"
                            alt="{{ ucfirst($feature) }}" style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">{{ ucfirst($feature) }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="product-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0 fade-in">
                <h2 class="mb-4 section-title">Temukan Project dengan mudah</h2>
                <p class="mb-4">Temukan berbagai proyek yang sesuai dengan minat dan keahlian Anda dengan mudah. Kami
                    menyediakan platform yang memudahkan kolaborasi dan memberikan akses ke peluang terbaik.</p>
                <p><a href="{{ route('mahasiswa.pekerjaan') }}" class="btn btn-primary">Explore</a></p>
            </div>
            @foreach ($pekerjaan as $item)
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0 fade-in">

                    <a class="product-item" href="{{ route('mahasiswa.pekerjaan.show', $item->id) }}">
                        <!-- Gambar pekerjaan -->
                        <img src="{{ asset('images/complete.png') }}" class="img-fluid product-thumbnail"
                            alt="{{ $item->posisi }}">
                        <!-- Ubah link ke rute pekerjaan -->
                        <h3 class="product-title">Posisi : {{ $item->posisi }}</h3>
                        <p class="product-description">Deskripsi : {{ Str::limit($item->deskripsi, 100) }}</p>
                        <p class="product-location">Tempat : {{ $item->tempat_bekerja }}</p>
                        {{-- <p class="product-date">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M, Y') }}</p> --}}
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>

<div class="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 fade-in">
                <h2 class="section-title">Recent Blog</h2>
            </div>
            <div class="col-md-6 text-start text-md-end fade-in">
                <a href="#" class="more">View All Posts</a>
            </div>
        </div>

        <div class="row">
            @foreach ($artikel as $item)
                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0 fade-in">
                    <div class="post-entry">
                        <a href="{{ route('event.detail', $item->id) }}" class="post-thumbnail">
                            <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="{{ route('event.detail', $item->id) }}">{{ $item->judul }}</a></h3>
                            <div class="meta">
                                <span>by {{ $item->user->name ?? 'Unknown' }}</span>
                                <span>on {{ \Carbon\Carbon::parse($item->tanggal)->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/tiny-slider.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fade-in animation on scroll
        const fadeElems = document.querySelectorAll('.fade-in');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1
        });

        fadeElems.forEach(elem => observer.observe(elem));

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    });
</script>
