<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name') }}</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/techno-park-style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/slick/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/slick/slick-theme.css') }}">
    <link rel="icon" href="{{ asset(Meta::get('icon') ?? 'assets/images/techno-park-logo-square.png') }}">
	
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=NTR|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

	@stack('styles')

</head>
<body data-spy="scroll" data-offset="100" data-target="#navbar" data-offset="0" id="beranda" class="{{ Request::segment(1) ? 'pt-5' : '' }}">

	<!-- Navbar -->
	@if (empty(Request::segment(1)))

	<nav class="navbar navbar-light position-absolute navbar-expand-lg w-100 px-4" id="navbar">
		<div class="container">
			<a class="navbar-brand font-weight-bold" href="{{ url('') }}">
				<img src="{{ asset(Meta::get('logo') ?? 'assets/images/techno-park-logo.png') }}" height="50px">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto font-weight-bold">
					<li class="nav-item">
						<a class="nav-link active" href="#beranda">Beranda <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#berita">Berita</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#profil">Profil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#mitra">Mitra</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	@else

	<nav class="navbar fixed-top navbar-expand-lg w-100 my-navbar text-center" id="navbar">
		<div class="container justify-content-center">
			<a class="navbar-brand font-weight-bold" href="{{ url('') }}">
				<img src="{{ asset(Meta::get('logo') ?? 'assets/images/techno-park-logo.png') }}" height="50px">
			</a>
		</div>
	</nav>

	@endif

	@yield('content')

	<!-- Footer -->

	<footer>
		<div class="container">
			<div class="row py-5">
				<div class="col-md-3 offset-2">
					<div id="googleMap" style="width:95%;height:200px;"></div>
				</div>
				<div class="col-md-3 offset-md-1 footer-profile">
					<h4>SMK NEGERI 4 BANDUNG</h4>
					<p class="m-0">
						Jalan Kliningan Nomor 6 Buah Batu
						<br> Telp/Fax : (022) - 7303736
						<br> Kode Pos : 40264 Kota Bandung
						<br> Provinsi Jawa Barat
						<br> Indonesia
					</p>
					<a href="https://smkn4bdg.sch.id" target="_blank">Visit us</a>
				</div>
			</div>
			<hr class="m-0">
			<div class="row text-center font-weight-bold py-3">
				<div class="col">
					<p class="m-0">Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.linkedin.com/in/irfan-fakhri/" target="_blank">Irfan Fakhri</a>. All Rights Reserved</p>
				</div>
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="{{ asset('assets/scripts/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/scripts/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/vendor/slick/slick.min.js') }}"></script>

	<script type="text/javascript">

		function myMap() {
			var myCenter = new google.maps.LatLng(-6.9416583,107.6288947);
			var mapCanvas = document.getElementById("googleMap");
			var mapOptions = {
				center: myCenter,
				zoom: 14
			};
			var map = new google.maps.Map(mapCanvas, mapOptions);
			var marker = new google.maps.Marker({
				position:myCenter
			});
			marker.setMap(map);
		}

	</script>

	@stack('scripts')

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbJ83iOH3BNaVWtOjaKUikj9sx2OIHzfs&callback=myMap"></script>

</body>

</html>