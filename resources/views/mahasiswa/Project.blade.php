@include('layouts.header')

<body>
    <div class="py-5 my-auto" style="background: linear-gradient(to right, #0DBDE5, #2DB08B)">
        <div class="container py-5 my-auto"
            style="min-height: 10vh; display: flex; flex-direction: column; justify-content: center;">
            <!-- Baris pertama dengan 5 kartu -->
            <div class="row justify-content-center text-center"> <!-- Tambahkan justify-content-center -->
                <!-- Kartu 1: Animasi dari kiri -->
                <div class="col-md-2 animate-from-left">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg" style="height: 150px; border-radius: 10px;">
                        <div href="{{ route('umkm') }}">
                            <img src="{{ asset('images/agrikultur.png') }}" class="card-img-top mx-auto"
                                alt="Galeri UMKM" style="width: 50%;">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 14px;">Agrikultur</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Kartu 2: Animasi dari kanan -->
                <div class="col-md-2 animate-from-right">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/akuntansi.png') }}" class="card-img-top mx-auto"
                            alt="Konsultasi UMKM" style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Akuntansi</h5>
                        </div>
                    </div>
                </div>
                <!-- Kartu 3: Animasi dari kiri -->
                <div class="col-md-2 animate-from-left">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/edukasi.png') }}" class="card-img-top mx-auto" alt="Informasi Bisnis"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Edukasi</h5>
                        </div>
                    </div>
                </div>
                <!-- Kartu 4: Animasi dari kanan -->
                <div class="col-md-2 animate-from-right">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/finance.png') }}" class="card-img-top mx-auto" alt="Chat"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Finance</h5>
                        </div>
                    </div>
                </div>
                <!-- Kartu 5: Animasi dari kiri -->
                <div class="col-md-2 animate-from-left">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/tekonolgi.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Teknologi</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Baris kedua dengan 5 kartu -->
            <div class="row justify-content-center text-center"> <!-- Tambahkan justify-content-center -->
                <!-- Kartu 6: Animasi dari kiri -->
                <div class="col-md-2 animate-from-left">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/kesehatan.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Kesehatan</h5>
                        </div>
                    </div>
                </div>
                <!-- Kartu 7: Animasi dari kanan -->
                <div class="col-md-2 animate-from-right">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/kreativ.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Kreativ</h5>
                        </div>
                    </div>
                </div>
                <!-- Kartu 8: Animasi dari kiri -->
                <div class="col-md-2 animate-from-left">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/lingkungan.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Lingkungan</h5>
                        </div>
                    </div>
                </div>
                <!-- Kartu 9: Animasi dari kanan -->
                <div class="col-md-2 animate-from-right">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/sosial.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Sosial</h5>
                        </div>
                    </div>
                </div>
                <!-- Kartu 10: Animasi dari kiri -->
                <div class="col-md-2 animate-from-left">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded-lg"
                        style="height: 150px; border-radius: 10px;">
                        <img src="{{ asset('images/blog.png') }}" class="card-img-top mx-auto" alt="Blog"
                            style="width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 14px;">Lainya</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     @php
        $categories = ['Agrikultur', 'Akuntansi', 'Edukasi', 'Finance', 'Teknologi', 'Kesehatan', 'Kreatif', 'Lingkungan', 'Sosial', 'Lainnya'];
    @endphp

{{-- {{ route('jobs.show', $job->id) }} --}}
    @foreach($categories as $category)
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">{{ $category }}</h2>
                        <p class="mb-4">Temukan pekerjaan menarik di bidang {{ $category }}.</p>
                        <p><a href="{{ route('mahasiswa.pekerjaan.category', $category) }}" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    @php
                        $jobs = App\Models\pekerjaan::where('kategori', $category)->take(3)->get();
                    @endphp

                    @foreach($jobs as $job)
                    <!-- Job Listing -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $job->posisi }}</h3>
                            <strong class="product-price">{{ $job->tempat_bekerja }}</strong>
                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Job Listing -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    @endforeach


    {{-- <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Agrikultur</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->

                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Akuntansi</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->

                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Edukasi</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->
                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Finance</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->



                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Teknologi</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->


                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Kesehtan</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->



                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Kreativ</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->



                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Lingkungan</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->


                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Sosial</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->



                </div>
            </div>
        </div>
    </div>
    <div class="shadow-lg">
        <div class="product-section shadow-sm">
            <div class="container">
                <div class="row">
                    <!-- Start Column 1 -->
                    <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                        <h2 class="mb-4 section-title">Lainnya</h2>
                        <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit.
                            Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
                        <p><a href="shop.html" class="btn">Explore</a></p>
                    </div>
                    <!-- End Column 1 -->

                    <!-- Start Column 2 -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="cart.html">
                            <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">Marketing skills and video editing</h3>
                            <strong class="product-price">Wildho Marketing Agency</strong>

                            <span class="icon-cross">
                                <img src="{{ asset('images/logosme.jpg') }}" class="img-fluid">
                            </span>
                        </a>
                    </div>
                    <!-- End Column 2 -->
                </div>
            </div>
        </div>
    </div> --}}
</body>
