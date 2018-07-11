@extends('admin.layouts.app')

@section('content')

<div class="row mb-4">
	<div class="col">
		<div class="bgc-white p-20 bd">
			<h5 class="c-grey-900">
				Create Post
			</h5>
			<input class="form-control" name="title" value="" placeholder="Post Title">
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-9">
		<div class="bgc-white p-20 bd">
			<div class="form-group">
				<textarea class="content" name="content"></textarea>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="bgc-white p-20 bd">
			<div class="form-group">
				<h6 class="c-grey-900">Publish Date</h6>
				<div class="input-group mb-2 mr-sm-2">
					<input type="text" class="form-control datepicker" name="date" placeholder="{{ \Carbon\Carbon::now()->format('d/m/Y') }}">
					<div class="input-group-append">
						<div class="input-group-text bgc-blue-500 bdc-blue-500 c-white"><i class="ti-calendar"></i></div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<h6 class="c-grey-900">Featured Image</h6>
				<button class="btn btn-primary" id="btnSelectImage">Select Image</button>
				<img src="" class="w-100 mt-3" id="featuredImage">
				<input type="hidden" name="featured_image_path">
			</div>
		</div>
		<div class="form-group text-right mt-3">
			<button class="btn btn-primary" type="submit"><i class="ti-save"></i> Save</button>
		</div>
	</div>
</div>

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
	                    getFileCallback: function(url) {
	                    	var image_path = '{{ asset('storage') }}/' + url.path
	                    	$('.ui-dialog-titlebar-close').click()
	                        $('#featuredImage').attr('src', image_path)
	                        $('[name=featured_image_path]').value(url.path)
	                    }
	                }).elfinder('instance')
	            }
	        })
        })

	})
</script>
@endpush