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
		var table = $('#dataTable').DataTable({
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
                        <a href="{{ url('post') }}/' + row.slug + '" class="btn btn-primary"><i class="ti-eye"></i></a>\
                        <a href="{{ url('admin/posts') }}/' + row.id + '/edit" class="btn btn-warning"><i class="ti-pencil-alt"></i></a>\
                        <button data-id="' + row.id + '" data-title="' + row.title + '" class="btn btn-danger btn-delete"><i class="ti-trash"></i></button>\
                        '
                    }
                }
            ],
            columnDefs: [ { 
                targets: [0, 4],
                sortable: false,
            } ],
            order: [[ 2, 'desc' ]]
        })

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault()

            var id = $(this).data('id')
            var title = $(this).data('title')
            var url = '{{ url('admin/posts') }}/' + id

            var parent = $(this).parent().parent()

            swalDangerButton({
                title: 'Are you sure?',
                text: `You are about to delete '${title}' post`,
                type: 'warning',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                reverseButtons: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                preConfirm: () => {
                    return fetch(url, {
                        method: 'POST',
                        body: JSON.stringify({
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        }),
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        credentials: "same-origin"
                    }).then(res => {
                        if (res.ok) {
                            return res.json()
                        }

                        throw new Error(response.statusText)
                    }).catch(err => {
                        swalDangerButton.showValidationError(
                            `Request failed: ${err}`
                        )
                    })
                },
                allowOutsideClick: () => !swalDangerButton.isLoading()
            }).then(res => {
                if (res.value) {
                    table.ajax.reload()
                    swalPrimaryButton(
                        'Deleted!',
                        'Your post has been deleted.',
                        'success'
                    )
                } else if (
                    // Read more about handling dismissals
                    res.dismiss === swalDangerButton.DismissReason.cancel
                ) {
                    swalPrimaryButton(
                        'Cancelled',
                        'Your post is safe :)',
                        'error'
                    )
                }
            })
        })
	})
</script>
@endpush