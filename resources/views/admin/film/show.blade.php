@extends('layouts.admin')


@section('prev')
    <a class="navbar-brand" href="{{ route('dashboard')}}">
        Dashboard
    </a>
@endsection

@section('next')
    <a class="navbar-brand" href="{{ route('category.show', $film->category_id) }}">
        Film Category
    </a>
@endsection



@section('content')

    @if($film)
        <div style="width: 90%" class="admin-film-content">


            <div class="col-sm-7">

                <h1 style="text-align: center">{{$film->title}}</h1>

                <h2>
                    Year: {{$film->year}}
                </h2>

                <h2>
                    Dual Audio: {{($film->dual_audio) ? 'Yes' : 'No'}}
                </h2>

                <h2>
                    Created At: {{$film->created_at->diffForHumans()}}
                </h2>


                <h2>
                    Updated At: {{$film->updated_at->diffForHumans()}}
                </h2>


                <br>
                <br>
                <br>

                <div style="width: 80%; margin: auto">

                    {!! Form::open(['method' => 'GET', 'action' => ['adminFilmController@edit', $film->id]]) !!}
                    <div class="form-group">
                        {!!  Form::submit('Edit', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                    {!! Form::close() !!}


                    {!! Form::open(['method' => 'DELETE', 'action' => ['adminFilmController@destroy', $film->id]]) !!}
                    <div class="form-group">
                        {!!  Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>



            <div class="col-sm-5 admin-film-poster">
                @if($film->poster)
                    <img src="{{$film->poster->src()}}" alt="{{$film->title}}" class="img-responsive img-rounded">
                @endif
            </div>



        </div>
    @endif


@endsection