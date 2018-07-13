@extends('guest.layouts.app')

@section('content')

	<!-- Post -->

	<section class="my-5 py-5">
		<div class="container">
			<div class="row">
				<div class="col">
					<h1 class="section-title text-center mb-4 font-weight-bold">Berita</h1>
				</div>
			</div>
			<div class="row mt-3 justify-content-center">
				@foreach ($posts as $post)
				<div class="col-md-4">
					<div class="card mb-4 shadow-sm rounded-0">
						<div class="card-header-img rounded-0" style="background-image: url('{{ asset($post->image)  }}');"></div>
						<div class="card-body">
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
			<div class="row mx-0 mt-4 justify-content-center">
				<div class="text-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item {{ $current_page == 1 ? 'disabled' : '' }}">
								<a class="page-link" href="{{ $current_page == 1 ? 'javascript:void(0)' : route('guest.posts.index', $current_page - 1) }}" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							@for ($i = 1; $i <= $total_page; $i++)
							<li class="page-item {{ $current_page == $i ? 'active' : '' }}"><a class="page-link" href="{{ $current_page == $i ? 'javascript:void(0)' : route('guest.posts.index', $i) }}">{{ $i }}</a></li>
							@endfor
							<li class="page-item {{ $current_page == $total_page ? 'disabled' : '' }}">
								<a class="page-link" href="{{ $current_page == $total_page ? 'javascript:void(0)' : route('guest.posts.index', $current_page + 1) }}" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>

@endsection