@extends('layouts.front-end')

@section('content')

   <a href="/blog">Back to Blog List</a>
   @if($post)
        <h1>{{ $post->title }}</h1>
        <p>{!! $post->body !!}</p>
   @endif



@stop