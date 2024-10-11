<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

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

    <style>
        .img-zoomin {
            width: 100%;
            height: 300px; /* Atur tinggi sesuai kebutuhan */
            object-fit: cover; /* Pastikan gambar terisi tanpa merusak proporsi */
        }
    </style>

    <title>Pos UMKM</title>
</head>

<body>
    @include('layouts.header')

    <!-- Main Event Section Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-7 col-xl-8 mt-0">
                    @foreach ($artikel as $item)
                        <div class="position-relative overflow-hidden rounded mb-4">
                            <img src="{{ Storage::url($item->foto) }}" class="img-fluid rounded img-zoomin" alt="{{ $item->judul }}">
                            <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                                <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> {{ $item->created_at->diffInMinutes() }} minute read</a>
                                <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> 3.5k Views</a>
                                <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                                <a href="#" class="text-white link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                            </div>
                        </div>
                        <div class="border-bottom py-3">
                            <a href="#" class="display-4 text-dark mb-0 link-hover">{{ $item->judul }}</a>
                        </div>
                        <p class="mt-3 mb-4">{{ Str::limit($item->isi, 150) }}...</p>
                    @endforeach
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 pt-0">
                        <h3 class="mb-4">Related Articles</h3>
                        <div class="row g-4">
                            @foreach ($artikel as $related)
                                <div class="col-12">
                                    <div class="rounded overflow-hidden mb-3">
                                        <img src="{{ Storage::url($related->foto) }}" class="img-fluid rounded img-zoomin" alt="{{ $related->judul }}">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="#" class="h4 mb-2">{{ $related->judul }}</a>
                                        <p class="fs-5 mb-0"><i class="fa fa-clock"></i> {{ $related->created_at->diffInMinutes() }} minute read</p>
                                        <p class="fs-5 mb-0"><i class="fa fa-eye"></i> 3.5k Views</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    @include('layouts.footer')
</body>

</html>
