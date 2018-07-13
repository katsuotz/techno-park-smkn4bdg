@extends('admin.layouts.app')
@section('content')

<div class="bgc-white py-3 px-4 bd">
	<h5 class="c-grey-900 m-0">
		Overview
	</h5>
</div>

<div class="row mt-3">
	<div class="col-md-3">
		<div class="bgc-white p-20 bd">
			<h5 class="font-weight-bold c-grey-700">Posts</h5>
			<h3 class="c-grey-900 m-0">
				{{ \App\Post::count() }}
			</h3>
		</div>
	</div>

	<div class="col-md-3">
		<div class="bgc-white p-20 bd">
			<h5 class="font-weight-bold c-grey-700">Partners</h5>
			<h3 class="c-grey-900 m-0">
				{{ \App\Partner::count() }}
			</h3>
		</div>
	</div>
</div>

@endsection