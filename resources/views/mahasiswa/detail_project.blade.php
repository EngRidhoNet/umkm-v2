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
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('css/tiny-slider.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <title>Pos UMKM</title>
</head>

<body>
    @include('layouts.header')


    <!-- Main Post Section Start -->
    <!-- Main Post Section Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4 justify-content-center"> <!-- justify-content-center untuk menengahkan baris -->
                <div class="col-lg-7 col-xl-8 mt-0 text-center"> <!-- text-center untuk menengahkan teks -->
                    <div class="position-relative overflow-hidden rounded mx-auto">
                        <img src="{{asset('images/banner1.jpg')}}" class="img-fluid rounded img-zoomin w-100" alt="">
                        <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0;">
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-clock"></i> 06 minute read</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-eye"></i> 3.5k Views</a>
                            <a href="#" class="text-white me-3 link-hover"><i class="fa fa-comment-dots"></i> 05 Comment</a>
                            <a href="#" class="text-white link-hover"><i class="fa fa-arrow-up"></i> 1.5k Share</a>
                        </div>
                    </div>
                    <div class="border-bottom py-3">
                        <p href="#" class="display-4 text-dark mb-0 link-hover">Project UMKM Nasi Kebuli Ngebull - Project Manager</p>
                    </div>
                    <p class="mt-3 mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley standard dummy text ever since the 1500s, when an unknown printer took a galley...
                    </p>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <body style="font-family: Arial, sans-serif;">

        <div class="container-fluid py-5">
            <div class="container py-5">
                <h2 style="text-align: center;">Komentar</h2>

                <!-- Form Komentar -->
                <div style="margin-bottom: 20px;">
                    <textarea placeholder="Tulis komentar Anda..." style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px; resize: none;" rows="4"></textarea>
                    <button style="margin-top: 10px; padding: 10px 20px; background-color: #0DBDE5; color: white; border: none; border-radius: 5px; cursor: pointer;">Kirim</button>
                </div>

                <!-- Daftar Komentar -->
                <div style="border-top: 1px solid #ddd; padding-top: 10px;">
                    <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                        <strong style="color: #2DB08B;">John Doe</strong>
                        <p style="margin: 5px 0;">Ini adalah komentar pertama saya!</p>
                        <span style="font-size: 12px; color: #888;">2 jam yang lalu</span>
                    </div>
                    <div style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                        <strong style="color: #2DB08B;">Jane Smith</strong>
                        <p style="margin: 5px 0;">Komentar ini sangat membantu, terima kasih!</p>
                        <span style="font-size: 12px; color: #888;">1 jam yang lalu</span>
                    </div>
                </div>
            </div>
        </div>

    </body>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/tiny-slider.js')}}"></script>
    <script src="{{asset('js/tiny-slider.js')}}"></script>
    @include('layouts.footer')
</body>


</html>
