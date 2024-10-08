<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('css/tiny-slider.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
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
                <br>
                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Lebih Dari 100 UMKM .</h2>
                    <p class="mb-4">UMKM Kami tersedia di seluruh karesidenan Malang Raya</p>
                    <p><a href="shop.html" class="btn">Explore</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="{{asset('images/pakgembuslogor.png')}}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Pak Gembus Suhat</h3>
                        <strong class="product-price"></strong>

                        <span class="icon-cross">
                            <img src="{{asset('images/pakgembuslogor.png')}}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="{{asset('images/susujuper.png')}}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Susu Jupe </h3>
                        <strong class="product-price"></strong>

                        <span class="icon-cross">
                            <img src="{{asset('images/susujuper.png')}}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="{{asset('images/pakgembuslogor.png')}}" class="img-fluid product-thumbnail">
                        <h3 class="product-title">Pak Gembus Sigura-gura </h3>
                        <strong class="product-price"></strong>

                        <span class="icon-cross">
                            <img src="{{asset('images/pakgembuslogor.png')}}" class="img-fluid">
                        </span>
                    </a>
                </div>
                <!-- End Column 4 -->
             
            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>
