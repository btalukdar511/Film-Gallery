@extends('layouts.admin')


@section('prev')
    <a class="navbar-brand" href="{{ route('dashboard')}}">
        Dashboard
    </a>
@endsection

@section('next')
    <a class="navbar-brand" href="{{ route('film.create') }}">
        Add Film
    </a>
@endsection


@section('content')
    <div class="admin-cat-content">
        @if($films)
            @foreach($films as $film)
                <div class="admin-cat-film">
                    <a href="{{route('film.show', $film->id)}}">
                        <div>
                            <img src={{$film->poster->src()}} alt={{$film->title}}" class="img-responsive">
                        </div>
                        <span>{{$film->title}} ({{$film->year}})</span>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
@endsection