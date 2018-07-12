@extends('guest.layouts.app')

@section('content')

	<!-- Header -->

	<header class="main-header" style="background-image: url('./images/unity.jpg')" id="home"></header>

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
					<div class="card">
						<div class="card-header card-header-img" style="background-image: url('{{ asset($post->image)  }}');"></div>
						<div class="card-body">
							<h4 class="card-title">
								<a href="{{ url('post/' . $post->slug) }}">{{ $post->title }}</a>
							</h4>
							<p class="card-text">{{ strlen($post->clear_content) > 60 ? substr($post->clear_content, 0, 60) . '...' : $post->clear_content }}</p>
							<hr>
							<p class="card-text">
								<small class="text-muted">{{ $post->created_at->formatLocalized('%A, %d %B %Y') }}</small>
							</p>
						</div>
					</div>
				</div>
				@endforeach
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
							<h4 class="font-weight-bold">Visi</h4>
						</div>
						<div class="col-md-8 section-text " style="padding-left: 37px;">
							{!! $visi->meta_content !!}
						</div>
					</div>
					@endif
					@if ($misi)
					<div class="row mt-2">
						<div class="col-md-3">
							<h4 class="font-weight-bold">Misi</h4>
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
						<div class="col-md-7 mx-auto">
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