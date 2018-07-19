@extends('admin.layouts.app')

@section('content')

<form method="POST" action="{{ @$partner ? route('partners.update', $partner->id) : route('partners.store') }}">
	{{ csrf_field() }}
	{{ @$partner ? method_field('PATCH') : '' }}

	<div class="row">
		<div class="col">

			<div class="bgc-white p-20 bd mb-3">
				<div class="form-group">
					<input class="form-control" name="name" value="{{ old('name', @$partner->name) }}" placeholder="Partner / Company Name (ex: SMK Negeri 4 Bandung)" autocomplete="off">
				</div>
				<div class="form-group">
					<input class="form-control" name="url" value="{{ old('url', @$partner->url) }}" placeholder="Partner / Company Profile URL (ex: https://smkn4bdg.sch.id) (optional)" autocomplete="off">
				</div>
				<div class="form-group m-0">
					<button type="button" class="btn btn-primary" id="btnSelectImage">Select Logo</button>
				</div>
				<div class="form-group m-0">
					<img src="{{ old('logo_path', @$partner->image) ? asset(old('logo_path', @$partner->image)) : '' }}" class="mt-3" id="featuredImage" style="max-width: 100%; width: 180px;">
					<input type="hidden" name="logo_path" value="{{ old('logo_path', @$partner->image) }}">
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
	                        $('[name=logo_path]').val(url.path)
	                    }
	                }).elfinder('instance')
	            }
	        })
        })

	})
</script>
@endpush