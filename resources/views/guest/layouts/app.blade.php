<!DOCTYPE html>
<html>

<head>
	<title>Tecnho Park - SMKN 4 Bandung</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/techno-park-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/slick/slick-theme.css') }}">
	<link rel="icon" href="{{ asset('assets/images/techno-park-logo-square.png') }}">
	
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=NTR|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

</head>
<body data-spy="scroll" data-target="#navbar" data-offset="0" id="beranda">

	<!-- Navbar -->

	<nav class="navbar position-absolute navbar-expand-lg w-100" id="navbar">
		<div class="container">
			<a class="navbar-brand font-weight-bold" href="#">
				<img src="{{ asset('assets/images/techno-park-logo.png') }}" height="50px">
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

	<!-- Header -->

	<header class="main-header" style="background-image: url('./images/unity.jpg')" id="home"></header>

	<!-- Section -->

	<section class="news-section my-5 py-3" id="berita">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="section-title text-center mb-4 font-weight-bold">Berita</h1>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-4">
					<div class="card">
						<img class="card-img-top" src="./images/unity.jpg" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Special title treatment</a>
							</h4>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<hr>
							<p class="card-text">
								<small class="text-muted">3 Januari 2018</small>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<img class="card-img-top" src="./images/unity.jpg" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Special title treatment</a>
							</h4>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<hr>
							<p class="card-text">
								<small class="text-muted">3 Januari 2018</small>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<img class="card-img-top" src="./images/unity.jpg" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title">
								<a href="#">Special title treatment</a>
							</h4>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<hr>
							<p class="card-text">
								<small class="text-muted">3 Januari 2018</small>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Profil -->

	<section class="about-section my-5 py-3" id="profil">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="section-title text-center mb-4 font-weight-bold">Profil</h1>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					<div class="row mb-2">
						<div class="col-md-3">
							<h4 class="font-weight-bold">Vision</h4>
						</div>
						<div class="col-md-8">
							<p class="section-text">
								Menjadi Sekolah Menengah Kejuruan Unggulan di Jawa Barat yang berstandar Nasional dan Internasional
							</p>
						</div>
					</div>
					<div class="row mt-2">
						<div class="col-md-3">
							<h4 class="font-weight-bold">Mission</h4>
						</div>
						<div class="col-md-8">
							<ul class="section-list section-text">
								<li>Memperoleh calon siswa melalui seleksi yang proporsional</li>
								<li>Mendidik, mengembangkan karakter dan bakat peserta didik melalui Program Mata Pelajaran Wajib,Kejuruan, Muatan Lokal
									serta Pengembangan diri</li>
								<li>Membangun Kepercayaan Masyarakat melalui keterbukaan manajemen dan keuangan sekolah</li>
								<li>Membangun kredibilitas dan akuntabilitas sekolah melalui administrasi yang tertib, bersih dan transparan</li>
								<li>Meningkatkan kepercayaan stakeholder melalui Program dan kualitas kegiatan belajar mengajar</li>
								<li>Mengembangkan infrastruktur untuk mendukung proses kegiatan belajar mengajar dengan bantuan stakeholder</li>
								<li>Menghasilkan lulusan yang mampu bersaing dimasyarakat serta tidak melupakan budaya Jawa Barat.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="about-section my-5 py-3" id="mitra">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="section-title text-center mb-2 font-weight-bold">Mitra</h1>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					<div class="row mt-2">
						<div class="col-md-7 mx-auto">
							<div class="responsive">
								<div><img src="{{ asset('assets/images/smkn4.png') }}" alt="" height="150" class="img-mitra"></div>
								<div><img src="{{ asset('assets/images/google.png') }}" alt="" height="150" class="img-mitra"></div>
								<div><img src="{{ asset('assets/images/techno-park-logo.jpg') }}" alt="" height="150" class="img-mitra"></div>
								<div><img src="{{ asset('assets/images/arch-linux.png') }}" alt="" height="150" class="img-mitra"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

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

		$(document).ready(function () {

			$('.responsive').slick({
				dots: true,
				infinite: true,
				speed: 300,
				slidesToShow: 1,
				centerMode: true,
				variableWidth: true
			});


	        $(window).on('scroll', function () {
	        	var y = this.scrollY

	        	if (y >= 50) {
	        		$('.navbar').addClass('fixed-top my-navbar')
	        		$('.navbar').removeClass('position-absolute')
	        	} else {
	        		$('.navbar').addClass('position-absolute')
	        		$('.navbar').removeClass('fixed-top my-navbar')
	        	}
	        })

	        $(document).on('click', 'a[href^="#"]', function (event) {
			    event.preventDefault();

			    $('html, body').animate({
			        scrollTop: $($.attr(this, 'href')).offset().top
			    }, 500);
			});

		})

    </script>


	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbJ83iOH3BNaVWtOjaKUikj9sx2OIHzfs&callback=myMap"></script>

</body>

</html>