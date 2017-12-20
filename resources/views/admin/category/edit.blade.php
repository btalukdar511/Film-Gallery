@extends('layouts.admin')


@section('prev')
    <a class="navbar-brand" href="{{ route('dashboard')}}">
        Dashboard
    </a>
@endsection

@section('content')
    <div style="width: 50%; margin : auto">

        <h1 style="text-align: center">Edit Category</h1>

        {!! Form::model($cat, ['method' => 'PATCH', 'action'=>["adminCategoryController@update", $cat->id], 'role' => 'form']) !!}

        <div class="form-group">
            {!! Form::label('title', "Title : ") !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}

        </div>

        {!! Form::submit('Update',  ['class'=>'btn btn-primary btn-block']) !!}

        {!! Form::close() !!}

        <br>

        {!! Form::open(['method' => 'DELETE', 'action' => ['adminCategoryController@destroy', $cat->id]]) !!}
        <div class="form-group">
            {!!  Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
        </div>
        {!! Form::close() !!}


    </div>
@endsection