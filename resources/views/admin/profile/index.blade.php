@extends('admin.layouts.app')

@section('content')

<form method="POST" action="{{ route('profile.update') }}">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	<div class="row">
		<div class="col">

			<div class="bgc-white p-20 bd mb-3">
				<h5 class="c-grey-900">Username</h5>
				<input type="text" name="username" value="{{ old('username', Auth::user()->username) }}" class="form-control" placeholder="ex: johndoe66" autocomplete="off">
			</div>

			<div class="bgc-white p-20 bd mb-3">
				<h5 class="c-grey-900">Password</h5>
				<div class="form-group">
					<input type="password" name="old_password" class="form-control" placeholder="Write your old password (required)">
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="New Password (optional)">
				</div>
				<div class="form-group">
					<input type="password" name="password_confirmation" class="form-control" placeholder="Re-write your New Password (required if you change your password with the new one)">
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