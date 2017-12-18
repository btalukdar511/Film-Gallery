@extends('layouts.admin')

@section('prev')
    <a class="navbar-brand" href="{{ route('dashboard')}}">
        Dashboard
    </a>
@endsection


@section('next')
    <a class="navbar-brand" href="{{ route('film.show', $film->id)}}">
        Show Film
    </a>
@endsection



@section('content')


    {{--@include('errors.form_error')--}}

    <div style="width: 90%" class="admin-film-content">
        {!! Form::model($film, ['method' => 'PATCH', 'action' => ['adminFilmController@update', $film->id], 'files' => TRUE]) !!}

        <div class="col-sm-7">

            <h1 style="text-align: center">Edit Film</h1>


            {!! Form::label('title', "Title : ") !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}

            <br>

            {!! Form::label('year', "Year : ") !!}
            {!! Form::number('year', null, ['class'=>'form-control']) !!}

            <br>

            {!! Form::label('dual_audio', "Dual Audio : ") !!}
            {!! Form::select('dual_audio', [1=>'yes',0=>'No'], null, ['class'=>'form-control']) !!}

            <br>

            {!! Form::label('category_id', "Category : ") !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}

            <br><br>

            <div class="form-group">
                {!!  Form::submit('Update Post', ['class' => 'btn btn-primary col-sm-2']) !!}
            </div>


        </div>


        <div class="col-sm-5 admin-film-poster">

            {!! Form::label('poster', "Poster : ") !!}
            {!! Form::file('poster',  ['class'=>'form-control admin-film-poster-upload']) !!}

            <label for="poster">
                @if($film->poster)
                    <img src="{{$film->poster->src()}}" alt="{{$film->title}}" class="img-responsive img-rounded">
                @endif

                <span class="admin-film-poster-label-text">Click to change poster</span>
            </label>
        </div>


        {!! Form::close() !!}
    </div>




@endsection