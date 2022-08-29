@extends('admin.template.main')
@section('content')
    <div>
        {!! Form::open(['route' =>'admin/addBook', 'method' => 'post']) !!}
       
        <div class="row mb-3">
            {{ form::label('name', 'Book Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-6">
                {{ Form::text('bookName', '', ['class' => 'form-control']) }}
                @error('bookName')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            {{ form::label('name', 'Auther Name', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-6">
                {{ Form::text('autherName', '', ['class' => 'form-control']) }}
                @error('autherName')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            {{ form::label('name', 'Book Price', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-6">
                {{ Form::text('bookPrice', '', ['class' => 'form-control']) }}
                @error('bookPrice')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            {{ form::label('name', 'Department', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-6">
                {{ form::select('department', ['','Software Developer', 'QA Analyst', 'Manager', 'HR'], '', ['class' => 'form-control']) }}
                @error('department')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            {{ form::label('name', 'Book Number', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-6">
                {{ Form::text('bookNumber', '', ['class' => 'form-control']) }}
                @error('bookNumber')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            {{ form::label('name', 'Book Avaliable', ['class' => 'col-sm-2 col-form-label']) }}
            <div class="col-sm-6">
                {{ form::radio('bookAvailable','yes')}} yes  
                {{ form::radio('bookAvailable','Female')}} No  
                @error('bookAvailable')
                    <span style="color: red">{{ $message }} </span>
                @enderror
            </div>
        </div>

        <div class="container bg-light">
            <div class="row mb-12  text-center">
                <input type="submit" name='submit' value='Add' class="btn btn-primary">
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
