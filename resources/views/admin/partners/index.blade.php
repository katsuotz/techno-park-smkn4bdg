@extends('admin.layouts.app')

@section('content')

<div class="bgc-white p-20 bd">
	<h5 class="c-grey-900 mb-4">
		Posts
		<a href="{{ route('partners.create') }}" class="btn btn-primary btn-sm">Add New</a>
	</h5>

	<table class="table" id="dataTable">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Partner</th>
                <th>URL</th>
                <th>Last Update</th>
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
                url: '{{ route('partners.get') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                }
            },
            columns: [
                {
                    render: function (data, type, row) {
                        return '<img src="{{ asset('') }}' + row.image + '" width="80">'
                    }
                }, {
                    data: {
                        _: 'name',
                        sort: 'name'
                    },
                }, {
                    render: (data, type, row) => {
                        return row.url ? `<a target='_blank' href='${row.url}'>${row.url}</a>` : '<i>empty</i>'
                    },
                }, {
                    data: {
                        _: 'updated_at',
                        sort: 'updated_at'
                    },
                }, {
                    render: function (data, type, row) {
                        return '\
                        <a href="{{ url('admin/partners') }}/' + row.id + '/edit" class="btn btn-warning"><i class="ti-pencil-alt"></i></a>\
                        <button data-id="' + row.id + '" data-title="' + row.title + '" class="btn btn-danger btn-delete"><i class="ti-trash"></i></button>\
                        '
                    }
                }
            ],
            columnDefs: [ { 
                targets: [0, 2, 4],
                sortable: false,
            } ],
            order: [[ 3, 'desc' ]]
        })

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault()

            var id = $(this).data('id')
            var title = $(this).data('title')
            var url = '{{ url('admin/partners') }}/' + id

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
                    parent.slideUp()
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