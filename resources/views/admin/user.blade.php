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
            <a href="{{ route('admin/addUser')}} "  class="btn btn-primary">Add User</a>
        </div>
       
        <div class="col-md-6">
            <div align='right'>
                <div class="form-check form-check-inline">
                    <input class="form-check-input radio-button" type="radio" name="user" id="inlineRadio1" value="admin">
                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input radio-button" type="radio" name="user" id="inlineRadio2"
                        value="employee">
                    <label class="form-check-label" for="inlineRadio2">Emplpoyee</label>
                </div>
            </div>
        </div>
      
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table data-table" id="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Actions</th>
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
                    url: "{{ route('admin.userList') }}",
                    type: 'POST',
                    data: function(request) {
                        request._token = '{{ csrf_token() }}';
                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'user_type'
                    },
                    {
                        data: null,
                        searchable: false,
                        orderable: false,
                        render: function(date, type, row, meta) {
                            return "<a href='/admin/editUserForm?id=" + row.id +
                                "' class='edit btn btn-info btn-sm'>Edit</a> <a href='/admin/deleteUserData?id=" +
                                row.id + "' class='edit btn btn-danger btn-sm'>Delete</a>";
                        }
                    },
                ]
            });

            $('.radio-button').click(function() {
                organizationTable.search(this.value).draw();
            });
        });
    </script>

@endsection
