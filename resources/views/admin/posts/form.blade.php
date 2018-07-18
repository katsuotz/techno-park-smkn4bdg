@extends('admin.layouts.app')

@section('content')

<form method="POST" action="{{ @$post ? route('posts.update', $post->id) : route('posts.store') }}">
	{{ csrf_field() }}
	{{ @$post ? method_field('PATCH') : '' }}

	<div class="row">
		<div class="col-md-9">

			<div class="bgc-white p-20 bd mb-3">
				<input class="form-control" name="title" value="{{ old('title', @$post->title) }}" placeholder="Post Title" autocomplete="off">
			</div>

			<div class="bgc-white p-20 bd">
				<textarea class="content" name="content">{!! old('content', @$post->content) !!}</textarea>
			</div>
		</div>
		<div class="col-md-3">
			<div class="bgc-white p-20 bd">
				<div class="form-group">
					<h6 class="c-grey-900">Publish Date</h6>
					<div class="input-group mb-2 mr-sm-2">
						<input type="text" class="form-control datepicker" name="date" placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}" value="{{ old('date', @$post ? @$post->created_at->format('d/m/Y') : '') }}" autocomplete="off">
						<div class="input-group-append">
							<div class="input-group-text bgc-blue-500 bdc-blue-500 c-white"><i class="ti-calendar"></i></div>
						</div>
					</div>
				</div>
				<div class="form-group m-0">
					<h6 class="c-grey-900">Featured Image</h6>
					<button type="button" class="btn btn-primary" id="btnSelectImage">Select Image</button>
					<img src="{{ old('featured_image_path', @$post->image) ? asset(old('featured_image_path', @$post->image)) : '' }}" class="w-100 mt-3" id="featuredImage">
					<input type="hidden" name="featured_image_path" value="{{ old('featured_image_path', @$post->image) }}">
				</div>
			</div>
			<div class="form-group text-right mt-3">
				<button class="btn btn-primary" type="submit">Save</button>
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

		$('.datepicker').datepicker({
			format: 'dd/mm/yyyy',
			language: 'id',
			weekStart: 1,
		})

		$('.content').ckeditor({
			filebrowserBrowseUrl : '{{ url('elfinder/ckeditor') }}',
	        filebrowserImageBrowseUrl : '{{ url('elfinder/ckeditor') }}',
	        height: 500,
		})

        $('#btnSelectImage').click(function () {
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
	                    	var image_path = '{{ asset('') }}' + url.path
	                    	$('.ui-dialog-titlebar-close').click()
	                        $('#featuredImage').attr('src', image_path)
	                        $('[name=featured_image_path]').val(url.path)
	                    }
	                }).elfinder('instance')
	            }
	        })
        })

	})
</script>
@endpush