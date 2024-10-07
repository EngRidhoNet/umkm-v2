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
	<title>Post UMKM</title>
	<style>
		.card {
			min-height: 2px;
			/* Sesuaikan sesuai kebutuhan */
		}
	</style>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-biru-gelap shadow-lg" arial-label="Furni navigation bar" style="background: linear-gradient(to right, #0DBDE5, #2DB08B)">

		<div class="container">
			<a class="navbar-brand" href="index.html">
				<img src="{{asset('images/logorevv.png')}}" alt="" width="60">
			</a>
			<a class="navbar-brand" href="index.html">Pos<span>UMKM</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item active">
						<a class="nav-link" href="index.html">Beranda</a>
					</li>
					<li><a class="nav-link" href="shop.html">Event</a></li>
					<li><a class="nav-link" href="about.html">UMKM</a></li>

				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<li><a class="nav-link" href="#"><img src="{{asset('images/user.svg')}}"></a></li>
					<li><a class="btn btn-secondary me-2" href="{{ route('login') }}">Login</a></li>
				</ul>
			</div>
		</div>

	</nav>
	<!-- End Header/Navigation -->
