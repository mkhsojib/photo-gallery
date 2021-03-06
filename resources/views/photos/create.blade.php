@extends('layouts.app')


@section('content')
    <h3>Upload Photos</h3>


    {!!Form::open(['action' => 'PhotosController@store','method' => 'POST', 'enctype'=>'multipart/form-data'])!!}

    {{Form::text('title','',['placeholder' => 'Photo title'])}}
    {{Form::textarea('description','',['placeholder' => 'Photo Description'])}}
    {{Form::hidden('album_id', $album_id)}}

    {{Form::file('photo')}}

    {{Form::submit('submit', ['class'=>'button primary'])}}

    {!! Form::close() !!}

@endsection