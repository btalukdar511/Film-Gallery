@extends('layouts.admin')


@section('prev')
    <a class="navbar-brand" href="{{ route('dashboard')}}">
        Dashboard
    </a>
@endsection

@section('content')
    <div style="width: 50%; margin : auto">


        <h1 style="text-align: center"> Create Category</h1>

        {!! Form::open(['action'=>"adminCategoryController@store", 'role' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('title', "Title : ") !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}

        </div>

        {!! Form::submit('Create',  ['class'=>'btn-default form-control']) !!}

        {!! Form::close() !!}

    </div>
@endsection