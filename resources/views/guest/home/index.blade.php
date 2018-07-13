@extends('guest.layouts.app')

@section('content')

	<!-- Header -->
	<span id="home"></span>
	<header class="main-header d-none d-md-block" style="background-image: url('{{ asset(Meta::get('banner')) }}')"></header>
	<img src="{{ asset(Meta::get('banner')) }}" class="header-img-banner d-md-none mt-5">
	<!-- Section -->

	@if ($posts->count())
	<section class="news-section my-5 py-3" id="berita">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="section-title text-center mb-4 font-weight-bold">Berita</h1>
				</div>
			</div>
			<div class="row mt-3 justify-content-center">
				@foreach ($posts as $post)
				<div class="col-md-4">
					<div class="card shadow-sm rounded-0 mb-3">
						<div class="card-header-img rounded-0" style="background-image: url('{{ asset($post->image)  }}');"></div>
						<div class="card-body py-3">
							<h5 class="card-title m-0">
								<a href="{{ url('post/' . $post->slug) }}">{{ $post->title }}</a>
							</h5>
							<p class="card-text">
								<small class="text-muted">{{ $post->created_at->formatLocalized('%A, %d %B %Y') }}</small>
							</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="row">
				<div class="col text-center mt-3">
					<a href="{{ route('guest.posts.index') }}" class="btn btn-primary">Lihat Berita Lainnya</a>
				</div>
			</div>
		</div>
	</section>
	@endif

	<!-- Profil -->

	@if ($visi || $misi)
	<section class="about-section my-5 py-3" id="profil">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="section-title text-center mb-4 font-weight-bold">Profil</h1>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col">
					@if ($visi)
					<div class="row mb-2">
						<div class="col-md-3">
							<h4 class="font-weight-bold text-center text-lg-right">Visi</h4>
						</div>
						<div class="col-md-8 section-text " style="padding-left: 37px;">
							{!! $visi->meta_content !!}
						</div>
					</div>
					@endif
					@if ($misi)
					<div class="row mt-2">
						<div class="col-md-3">
							<h4 class="font-weight-bold text-center text-lg-right">Misi</h4>
						</div>
						<div class="col-md-8 section-text">
							{!! $misi->meta_content !!}
						</div>
					</div>
					@endif
				</div>
			</div>
		</div>
	</section>
	@endif

	@if ($partners->count())
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
						<div class="col-md-7 col-10 mx-auto">
							<div class="responsive">
								@foreach ($partners as $partner)
								<div><a href="{{ $partner->url ?? 'javascript:void(0)' }}" target="_blank"><img src="{{ asset($partner->image) }}" alt="" height="150" class="img-mitra"></a></div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endif

@endsection

@push('scripts')
<script type="text/javascript">
	$('.responsive').slick({
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 1,
		centerMode: true,
		variableWidth: true
	});


	@if (empty(Request::segment(1)))

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

	@endif

	$(window).scroll()

	$(document).on('click', 'a[href^="#"]', function (event) {
		event.preventDefault();

		$('html, body').animate({
			scrollTop: $($.attr(this, 'href')).offset().top - 100
		}, 500);
	});
</script>
@endpush