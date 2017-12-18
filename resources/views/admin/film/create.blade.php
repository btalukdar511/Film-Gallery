@extends('layouts.admin')


@section('prev')
    <a class="navbar-brand" href="{{ route('dashboard')}}">
        Dashboard
    </a>
@endsection

@section('content')
    <div style="width: 50%; margin : auto">

        {!! Form::open(['action'=>"adminFilmController@store", 'role' => 'form', 'files'=>'true']) !!}

        <div class="form-group">
            {!! Form::label('title', "Title : ") !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}

            {!! Form::label('year', "Year : ") !!}
            {!! Form::number('year', null, ['class'=>'form-control']) !!}

            {!! Form::label('dual_audio', "Dual Audio : ") !!}
            {!! Form::select('dual_audio', [1=>'yes',0=>'No'], 1, ['class'=>'form-control']) !!}

            {!! Form::label('category_id', "Category : ") !!}
            {!! Form::select('category_id', $cats, null, ['class'=>'form-control']) !!}

            {!! Form::label('poster', "Poster : ") !!}
            {!! Form::file('poster',  ['class'=>'form-control poster']) !!}

            <label for="poster">
                <span class="label-text">Click to add poster</span>
            </label>
        </div>

        {!! Form::submit('Create',  ['class'=>'btn-default form-control']) !!}

        {!! Form::close() !!}

    </div>
@endsection