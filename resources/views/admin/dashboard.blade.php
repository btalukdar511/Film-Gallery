@extends('layouts.admin')

@section('prev')
    <a class="navbar-brand" href="{{ url('/') }}">
        JDZone
    </a>
@endsection

@section('next')
    <a class="navbar-brand" href="{{ route('category.create') }}">
        Add Category
    </a>
@endsection

@section('content')
    <div>

        <div style="float: left; width: 50%;">
            <h2 align="center">
                Categories
            </h2>

            @php
                $cats = App\Category::all();
            @endphp

            <div class="list-group admin-dash-cat" style="margin: 0 40px">
                @foreach($cats as $cat)
                    <div class="list-group-item">
                        <a href="{{route('category.show', $cat->id)}}">
                            {{$cat->title}}
                        </a>

                        <span class="pull-right">
                        <span class="glyphicon glyphicon-edit"></span> <a href="{{route('category.edit', $cat->id)}}">Edit</a>

                        <span class="badge">
                            {{count($cat->films)}}
                        </span>
                        </span>
                    </div>


                @endforeach
            </div>
        </div>

        <div style="float: right; width: 50%;">
            <h2 align="center">
                Films
            </h2>

            @php
                $films = App\Film::all();
            @endphp

            <div class="admin-dash-film">
                @foreach($films as $film)
                    <a href="{{route('film.show', $film->id)}}">
                        <div>
                            <img src="{{$film->poster->src()}}" alt="{{$film->title}}"
                                 class="img-responsive img-rounded">
                            <span>{{$film->title}}</span>
                        </div>
                    </a>
                @endforeach

            </div>


        </div>

    </div>
@endsection