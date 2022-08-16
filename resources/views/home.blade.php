@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    </table>
                </div>
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $row)
                        <tr class="item{{$row->id}}">
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td><button class="edit-modal btn btn-info">
                                   
                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                </button>
                                <button class="delete-modal btn btn-danger"
                                    >
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                </button></td>
                        </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
      $('#table').DataTable();
  } );
   </script>
@endsection