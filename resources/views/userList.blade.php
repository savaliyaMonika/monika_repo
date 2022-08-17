@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
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
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>

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
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            organizationTable = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                searching: true,
                ordering: true,
                stateSave: true,
                pagingType: "full_numbers",
                ajax: {
                    url: "{{ route('yajraDataTablelist') }}",
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
                            return "<a href='updateUserForm?id=" + row.id +
                                "' class='edit btn btn-info btn-sm'>Edit</a> <a href='deleteUser?id=" +
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
