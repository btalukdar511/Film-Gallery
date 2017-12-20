@extends('layouts.admin')


@section('prev')
    <a class="navbar-brand" href="{{ route('dashboard')}}">
        Dashboard
    </a>
@endsection

@section('next')
    {{--<a class="navbar-brand" href="{{ route('film.create') }}">--}}
    {{--Add Film--}}
    {{--</a>--}}

    {{--<ul class="navbar-brand">--}}
    {{--<li class="dropdown">--}}
    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
    {{--xc <span class="caret"></span>--}}
    {{--</a>--}}

    {{--<ul class="dropdown-menu" role="menu">--}}
    {{--<li>--}}
    {{--Something--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</li>--}}
    {{--</ul>--}}



    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Add Film <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('film.create') }}">
                        Single
                    </a>
                </li>
                <li>
                    <a href="{{ route('film.add') }}">
                        Multiple
                    </a>
                </li>
            </ul>
        </li>
    </ul>
@endsection


@section('content')
    <div class="admin-cat-content">
        @if($films)
            @foreach($films as $film)
                <div class="admin-cat-film">
                    <a href="{{route('film.show', $film->id)}}">
                        <div>
                            <img src={{$film->poster->src()}} alt={{$film->title}}" class="img-responsive img-rounded">
                        </div>
                        <span>{{$film->title}} ({{$film->year}})</span>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
@endsection