@extends('admin.template.main')
@section('content')
    <div>
        <form action="{{ route('admin/insertUser') }}" method="post">
            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" name='name' class="form-control" id="inputEmail3" value="{{ old('name') }}">
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
                                value="admin" {{ old('user') == 'admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input radio-button" type="radio" name="user" id="inlineRadio2"
                                value="employee" {{ old('user') == 'employee' ? 'checked' : '' }}>
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
                    <input type="email" class="form-control" name='email' value="{{ old('email') }}" id="inputEmail3">
                    @error('email')
                        <span style="color: red">{{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name='password' value="" id="inputPassword3">
                    @error('password')
                        <span style="color: red">{{ $message }} </span>
                    @enderror
                </div>
            </div>


            <div class="container bg-light">
                <div class="row mb-12  text-center">
                    <input type="submit" name='submit' value='Add' class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endsection
