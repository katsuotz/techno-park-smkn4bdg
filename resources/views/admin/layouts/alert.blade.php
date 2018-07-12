@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
	</button>
	<h5 class="alert-heading">Error!</h5>
	<ul>
	@foreach ($errors->all() as $error)
		<li>{!! $error !!}</li>
	@endforeach
	</ul>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
	</button>
	<h5 class="alert-heading">Error!</h5>
    <p class="m-0">{!! session('status') !!}</p>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
	</button>
	<h5 class="alert-heading">Success!</h5>
    <p class="m-0">{!! session('success') !!}</p>
</div>
@endif

@if (session('info'))
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    	<span aria-hidden="true">&times;</span>
	</button>
	<h5 class="alert-heading">Info!</h5>
    <p class="m-0">{!! session('info') !!}</p>
</div>
@endif
