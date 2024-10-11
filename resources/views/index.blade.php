@include('layouts.header')
<div class="shadow-lg">
    <div class="hero shadow-lg" style="">
        <div class="container ">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1 style="color:black">Pos<span clsas="d-block" style="color: black"> UMKM</span></h1>
                        <p class="mb-4 text-justify" style="color: black;">POSUMKM adalah sebuah bisnis sociopreneurship yang
                            berfokus pada
                            pemberdayaan pendidikan dan pertumbuhan UMKM. Kami menghubungkan
                            mahasiswa, dosen, dan pelaku usaha menengah ke bawah untuk menciptakan
                            solusi inovatif yang menjawab tantangan nyata yang dihadapi oleh UMKM.
                            Dengan POSUMKM, mahasiswa dapat menerapkan pengetahuan akademis
                            mereka dalam konteks dunia industri, sekaligus memberikan kontribusi nyata
                            dalam pengembangan UMKM lokal.</p>
                        <p><a href="" class="btn btn-secondary me-2">Apply Lowongan</a><a href="#"
                                class="btn btn-grey-outline" style="color: white">Berita</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
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
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- start of section feature -->
    <div class=" py-5 my-auto" style="background: linear-gradient(to right, #0DBDE5, #2DB08B">
        <div class="container py-5 my-auto"
            style="min-height: 10vh; display: flex; flex-direction: column; justify-content: center;">
            <div class="row text-center">
                <div class="col-md-2">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/umkm.png') }}" class="card-img-top mx-auto" alt="Galeri UMKM"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Galeri UMKM</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/konsultasi.png') }}" class="card-img-top mx-auto"
                            alt="Konsultasi UMKM" style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Konsultasi UMKM</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/informasi.png') }}" class="card-img-top mx-auto"
                            alt="Informasi Bisnis" style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Informasi Bisnis</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/chat.png') }}" class="card-img-top mx-auto" alt="Chat"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Chat</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/blog.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Blog</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/kontak.png') }}" class="card-img-top mx-auto" alt="Contact Us"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Contact Us</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of section feature -->
    <!-- Start UMKM Section -->
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Temukan UMKM Di Sekitar Malang Raya.</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start UMKM Columns (Dynamic Data) -->
                    @foreach ($umkm as $item)
                        <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                            <a class="product-item" href="cart.html">
                                <img src="{{ Storage::url('umkm/foto_profil/' . $item->foto_profil) }}"
                                    class="img-fluid product-thumbnail">
                                <h3 class="product-title">{{ $item->nama_umkm }}</h3>
                                <p class="product-description">{{ Str::limit($item->deskripsi, 100) }}</p>
                            </a>
                        </div>
                    @endforeach
                    <!-- End UMKM Columns -->

                </div>
            </div>
        </div>
    </div>
    <!-- End UMKM Section -->





    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2 class="section-title">Recent Blog</h2>
                </div>
                <div class="col-md-6 text-start text-md-end">
                    <a href="#" class="more">View All Posts</a>
                </div>
            </div>

            <div class="row">
                @foreach ($artikel as $item)
                    <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                        <div class="post-entry">
                            <a href="#" class="post-thumbnail">
                                <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}"
                                    class="img-fluid">
                            </a>
                            <div class="post-content-entry">
                                <h3><a href="#">{{ $item->judul }}</a></h3>
                                <div class="meta">
                                    <span>by <a href="#">{{ $item->user->name ?? 'Unknown' }}</a></span>
                                    <span>on <a
                                            href="#">{{ \Carbon\Carbon::parse($item->tanggal)->format('M d, Y') }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Blog Section -->

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    @include('layouts.footer')
    </body>

    </html>
