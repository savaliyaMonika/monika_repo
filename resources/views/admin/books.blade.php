@extends('admin.template.main')
@section('content')
    <!-- Page Heading -->

    <!-- Content Row -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="row" style="padding: 10px;">
        <div class="col-md-6">
            <a href=""  class="btn btn-primary">Add Book</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table data-table" id="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Book Name</th>
                        <th class="text-center">Book Auther</th>
                        <th class="text-center">Book Price </th>
                        <th class="text-center">Book Price</th>
                        <th class="text-center">Book Number</th>
                        <th class="text-center">Book Avaliable</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            organizationTable = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                searching: true,
                ordering: true,
                stateSave: true,
                pagingType: "full_numbers",
                ajax: {
                    url: "{{ route('admin/bookList') }}",
                    type: 'POST',
                    data: function(request) {
                        request._token = '{{ csrf_token() }}';
                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'book_name'
                    },
                    {
                        data: 'book_auther'
                    },
                    {
                        data: 'book_price'
                    },
                    {
                        data: 'book_dept'
                    },
                    {
                        data: 'book_number'
                    },
                    {
                        data: 'book_available'
                    },
                    
                    {
                        data: null,
                        searchable: false,
                        orderable: false,
                        render: function(date, type, row, meta) {
                            return '';
                          /*   return "<a href='/admin/editUserForm?id=" + row.id +
                                "' class='edit btn btn-info btn-sm'>Edit</a> <a href='/admin/deleteUserData?id=" +
                                row.id + "' class='edit btn btn-danger btn-sm'>Delete</a>"; */
                        }
                    },
                ]
            });

        });
    </script>

@endsection
