@extends('layouts.admin')

@section('styles')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" rel="stylesheet">

@stop

@section('content')

    <h1>Upload Media</h1>

    {!! Form::open(['method'=>'POST', 'action'=> 'Dashboard\AdminMediaController@store', 'class'=>'dropzone']) !!}

    {!! Form::close() !!}

@stop


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
@stop