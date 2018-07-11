@extends('admin.layouts.app')

@section('content')

<div class="bgc-white p-20 bd">
	<h5 class="c-grey-900 mb-4">
		Posts
		<a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Add New</a>
	</h5>

	<table class="table" id="dataTable">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Publish Date</th>
                <th>Updated at</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function () {
		$('#dataTable').dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('posts.get') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                }
            },
            columns: [
                {
                    render: function (data, type, row) {
                        return '<img src="{{ asset('') }}' + row.image + '" width="120">'
                    }
                }, {
                    data: {
                        _: 'title',
                        sort: 'title'
                    },
                }, {
                    data: {
                        _: 'created_at',
                        sort: 'created_at'
                    },
                }, {
                    data: {
                        _: 'updated_at',
                        sort: 'updated_at'
                    },
                }, {
                    render: function (data, type, row) {
                        return '\
                        <a href="#" class="btn btn-primary"><i class="ti-eye"></i></a>\
                        <a href="{{ url('admin/posts') }}/' + row.id + '/edit" class="btn btn-warning"><i class="ti-pencil-alt"></i></a>\
                        <a href="{{ url('admin/posts') }}/' + row.id + '" class="btn btn-danger"><i class="ti-trash"></i></a>\
                        '
                    }
                }
            ],
            columnDefs: [ { 
                targets: 0,
                sortable: false,
            }, {
                targets: 4,
                sortable: false,
            } ],
            order: [[ 2, 'desc' ]]
        });
	})
</script>
@endpush