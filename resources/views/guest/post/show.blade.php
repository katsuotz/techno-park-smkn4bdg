@extends('guest.layouts.app')

@section('content')

	<!-- Post -->

	<section class="my-5 py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="card shadow-sm p-4 rounded-0">
						<img src="{{ asset($post->image) }}" class="card-img-top rounded-0">
						<div class="card-body px-0 py-4">
							<h2 class="card-title">{{ $post->title }}</h2>
							{!! $post->content !!}
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-3 shadow-sm rounded-0">
						<div class="card-body text-center text-muted py-2">
							<h5 class="font-weight-bold m-0">Post Terbaru</h5>
						</div>
					</div>
					@foreach ($posts as $latest_post)
					<div class="card mb-4 shadow-sm rounded-0">
						<div class="card-header-img rounded-0" style="background-image: url('{{ asset($latest_post->image)  }}');"></div>
						<div class="card-body">
							<h5 class="card-title m-0">
								<a href="{{ url('post/' . $latest_post->slug) }}">{{ $latest_post->title }}</a>
							</h5>
							<p class="card-text">
								<small class="text-muted">{{ $latest_post->created_at->formatLocalized('%A, %d %B %Y') }}</small>
							</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

@endsection