@extends('layouts.front-end')

@section('content')

    <!-- Thank you Laracasts: https://laracasts.com/discuss/channels/laravel/best-way-to-render-markdown-in-views -->
   <a href="/blog">Back to Blog List</a>
   @if($post)
        <h1>{{ $post->title }}</h1>


        <div>{!! Markdown::convertToHtml($post->body) !!}</div>
   @endif



@stop