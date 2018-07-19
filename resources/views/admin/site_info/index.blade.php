@extends('admin.layouts.app')

@section('content')

<form method="POST" action="{{ route('site_info.update') }}">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	<div class="row">
		<div class="col">

			<ul class="nav nav-pills bd mb-3" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-ui-tab" data-toggle="pill" href="#pills-ui" role="tab" aria-controls="pills-ui" aria-selected="true">User Interface</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
				</li>
			</ul>

			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-ui" role="tabpanel" aria-labelledby="pills-ui-tab">
					<div class="bgc-white p-20 bd mb-3">
						<div class="row">
							<div class="col-md-6">
								<h5 class="c-grey-900 m-0">Logo Icon</h5>
								<label class="w-100">Must be square for better interface</label>
								<button type="button" class="btn btn-primary btn-select-image" data-target="#icon">Select Image</button>
								<div class="form-group m-0">
									<img src="{{ old('image.icon', Meta::get('icon')) ? asset(old('image.icon', Meta::get('icon'))) : '' }}" class="mt-3" id="icon" style="max-width: 100%; width: 180px;">
									<input type="hidden" name="image[icon]" value="{{ old('image.icon', Meta::get('icon')) }}">
								</div>
							</div>
							<div class="col-md-6">
								<h5 class="c-grey-900 m-0">Brandmark Logo</h5>
								<label class="w-100">Must be rectangle for better interface</label>
								<button type="button" class="btn btn-primary btn-select-image" data-target="#logo">Select Image</button>
								<div class="form-group m-0">
									<img src="{{ old('image.logo', Meta::get('logo')) ? asset(old('image.logo', Meta::get('logo'))) : '' }}" class="mt-3" id="logo" style="max-width: 100%; width: 360px;">
									<input type="hidden" name="image[logo]" value="{{ old('image.logo', Meta::get('logo')) }}">
								</div>
							</div>
						</div>
					</div>

					<div class="bgc-white p-20 bd mb-3">
						<h5 class="c-grey-900">Banner Image</h5>
						<button type="button" class="btn btn-primary btn-select-image" data-target="#banner">Select Image</button>
						<div class="form-group m-0">
							<img src="{{ old('image.banner', Meta::get('banner')) ? asset(old('image.banner', Meta::get('banner'))) : '' }}" class="mt-3" id="banner" style="max-width: 100%; width: 180px;">
							<input type="hidden" name="image[banner]" value="{{ old('image.banner', Meta::get('banner')) }}">
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					<div class="bgc-white p-20 bd mb-3">
						<h5 class="c-grey-900">Visi</h5>
						<textarea class="visi" name="visi">{!! old('visi', Meta::get('visi')) !!}</textarea>
					</div>

					<div class="bgc-white p-20 bd">
						<h5 class="c-grey-900">Misi</h5>
						<textarea class="misi" name="misi">{!! old('misi', Meta::get('misi')) !!}</textarea>
					</div>
				</div>
			</div>


			<div class="form-group text-right mt-3">
				<button class="btn btn-primary" type="submit">Save All</button>
			</div>
		</div>
	</div>
</form>

<div class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document" style="max-width: 1200px; height: 1000px;">
		<div class="modal-content">
			<div class="modal-body">
				<div class="elfinder" id="elfinder"></div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function () {

		$('textarea').ckeditor({
			filebrowserBrowseUrl : '{{ url('elfinder/ckeditor') }}',
	        filebrowserImageBrowseUrl : '{{ url('elfinder/ckeditor') }}',
	        height: 200,
	        toolbarGroups : [
			    { name: 'document',       groups: [ 'mode', 'document', 'doctools' ] },
			    { name: 'links' },
			    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
			    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
			]
		})

        $('.btn-select-image').click(function (e) {
        	var target = $(this).data('target')
	        $('<div \>').dialog({
	        	modal: true,
	        	width: "80%",
	        	title: "Select image",
	        	draggable: false,
	        	resizable: false,
	            create: function(event, ui) {
	                $(this).elfinder({
	                    resizable: false,
	                    url: '<?= url('elfinder/connector') ?>',
	                    customData: {
	                    	_token: '{{ csrf_token() }}',
	                    },
	                    getFileCallback: function(url) {
	                    	var path = url.path.replace('\\', '/')
	                    	var image_path = '{{ asset('') }}' + path
	                    	$('.ui-dialog-titlebar-close').click()
	                        $(target).attr('src', image_path)

	                        target = target.replace('#', '')
	                        $('[name=\'image[' + target + ']\']').val(path)
	                    },
	                }).elfinder('instance')
	            }
	        })
        })

	})
</script>
@endpush