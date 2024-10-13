<!-- detail.event.blade.php -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <meta name="description" content="{{ $artikel->judul }}" />
    <meta name="keywords" content="event, UMKM, {{ $artikel->judul }}" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .img-zoomin {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
    </style>

    <title>{{ $artikel->judul }} | Pos UMKM</title>
</head>

<body>
    @include('layouts.header')

    <!-- Event Detail Section Start -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Artikel Detail -->
                <div class="position-relative overflow-hidden rounded mb-4">
                    <img src="{{ Storage::url($artikel->foto) }}" class="img-fluid rounded img-zoomin" alt="{{ $artikel->judul }}">
                </div>

                <h1 class="display-4 text-dark mb-3">{{ $artikel->judul }}</h1>

                <div class="d-flex justify-content-start mb-4">
                    <span class="text-muted me-3"><i class="fa fa-clock"></i> {{ $artikel->created_at->diffForHumans() }}</span>
                    <span class="text-muted me-3"><i class="fa fa-eye"></i> {{ number_format($artikel->views) }} Views</span>
                    <span class="text-muted"><i class="fa fa-share-alt"></i> {{ number_format($artikel->shares) }} Shares</span>
                </div>

                <!-- Isi Artikel -->
                <p>{{ $artikel->isi }}</p>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="bg-light rounded p-4">
                    <h3 class="mb-4">Related Articles</h3>
                    <div class="row g-4">
                        @foreach ($relatedArticles as $related)
                            <div class="col-12">
                                <div class="rounded overflow-hidden mb-3">
                                    <img src="{{ Storage::url($related->foto) }}" class="img-fluid rounded img-zoomin" alt="{{ $related->judul }}">
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="{{ route('event.detail', $related->id) }}" class="h5 mb-2">{{ $related->judul }}</a>
                                    <p class="fs-6 text-muted"><i class="fa fa-clock"></i> {{ $related->created_at->diffInMinutes() }} minute read</p>
                                    <p class="fs-6 text-muted"><i class="fa fa-eye"></i> {{ number_format($related->views) }} Views</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Detail Section End -->

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    @include('layouts.footer')
</body>

</html>
