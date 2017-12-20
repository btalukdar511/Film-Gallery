@extends('layouts.admin')


@section('prev')
    <a class="navbar-brand" href="{{ route('dashboard')}}">
        Dashboard
    </a>
@endsection

@section('content')
    <div style="width: 90%; margin : auto">

        @foreach($films as $key=>$film)
            {!! Form::model($film, ['method'=>'POST','action'=>"adminFilmController@store", 'class'=>'multi-add-form form-inline multiAddSubmit', 'id'=>$key, 'role' => 'form']) !!}

            <div class="row">

                <div class="form-group col-lg-9">

                    <input type="hidden" name="method" value="multiple">

                    <input type="hidden" name="path" value="{{$film['path']}}">


                    {!! Form::label('title', "Title : ") !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}

                    {!! Form::label('year', "Year : ") !!}
                    {!! Form::number('year', null, ['class'=>'form-control year']) !!}

                    {!! Form::label('dual_audio', "Dual Audio : ") !!}
                    {!! Form::select('dual_audio', [1=>'yes',0=>'No'], null, ['class'=>'form-control audio']) !!}

                    {!! Form::label('category_id', "Category : ") !!}
                    {!! Form::select('category_id', $categories, null, ['class'=>'form-control category']) !!}

                </div>

                <div class="col-lg-1">
                    {!!Form::checkbox('select', 'value', true, ['class'=>'form-check select'])!!}
                </div>


                <div class="col-lg-2">

                    {!! Form::submit('Create',  ['class'=>'btn-default form-control btn-block btn-submit']) !!}

                </div>

                {!! Form::close() !!}


            </div>
            <br>
        @endforeach

        <br><br>


            {!! Form::open(['method'=>'POST','action'=>"adminFilmController@store", 'class'=>'multi-add-form form-inline multiAddSubmitAll', 'role' => 'form']) !!}

            <div class="row">

                <div class="col-lg-3" style="text-align: center; font-size: 18px">

                    {!! Form::label('title', "For all : ") !!}

                </div>

                <div class="form-group col-lg-6">

                    {!! Form::label('year', "Year : ") !!}
                    {!! Form::number('year', null, ['class'=>'form-control all-year']) !!}

                    {!! Form::label('dual_audio', "Dual Audio : ") !!}
                    {!! Form::select('dual_audio', [1=>'Yes',0=>'No'], null, ['class'=>'form-control all-audio']) !!}

                    {!! Form::label('category_id', "Category : ") !!}
                    {!! Form::select('category_id', $categories, null, ['class'=>'form-control all-category']) !!}

                </div>

                <div class="col-lg-1">
                    {!!Form::checkbox('select', 'value', true, ['class'=>'form-check all-select'])!!}
                </div>

                <div class="col-lg-2">
                    {!! Form::submit('Create All',  ['class'=>'btn-default form-control btn-block btn-submit']) !!}
                </div>

                {!! Form::close() !!}

            </div>

    </div>
@endsection