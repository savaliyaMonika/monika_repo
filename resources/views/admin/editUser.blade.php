@extends('admin.template.main')
@section('content')
    <div>

        <form action="{{ route('admin/editUser') }}" method="post">
            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="hidden" name="id" value='{{$row->id}}'>
                    <input type="text" name='name' class="form-control" id="inputEmail3" value="{{ $row->name }}">
                    @error('name')
                        <span style="color: red">{{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">User Type</label>
                <div class="col-sm-6">
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio-button" type="radio" name="user" id="inlineRadio1"
                                value="admin" {{ $row->user_type == 'admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio-button" type="radio" name="user" id="inlineRadio2"
                                value="employee" {{ $row->user_type == 'employee' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Employee</label>
                        </div>
                    </div>
                    @error('user')
                        <span style="color: red">{{ $message }} </span>
                    @enderror
                </div>

            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name='email' value="{{ $row->email }}" id="inputEmail3">
                    @error('email')
                        <span style="color: red">{{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="container bg-light">
                <div class="row mb-12  text-center">
                    <input type="submit" name='submit' value='Update' class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
