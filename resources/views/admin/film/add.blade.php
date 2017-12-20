@extends('layouts.admin')


@section('prev')
    <a class="navbar-brand" href="{{ route('dashboard')}}">
        Dashboard
    </a>
@endsection

@section('content')
    <div style="width: 50%; margin : auto">

        {!! Form::open(['method'=>'POST','action'=>"adminFilmController@multiadd", 'role' => 'form', 'files'=>'true']) !!}

        <div class="form-group">

            {!! Form::label('posters[]', "Poster : ") !!}
            {!! Form::file('posters[]',  ['class'=>'form-control poster', 'multiple'=>'multiple']) !!}

            <label for="posters[]">
                <span class="label-text">Click to add multiple films by poster</span>
            </label>
        </div>

        {!! Form::submit('Create',  ['class'=>'btn-default form-control']) !!}

        {!! Form::close() !!}

    </div>
@endsection