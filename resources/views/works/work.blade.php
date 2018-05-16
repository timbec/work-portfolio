@extends('layouts.front-end')

@section('content')

    <!-- Thank you Laracasts: https://laracasts.com/discuss/channels/laravel/best-way-to-render-markdown-in-views -->
   <a href="/">Back to Front Page</a>
   @if($work)
        <h1>{{ $work->title }}</h1>


        <div>{!! Markdown::convertToHtml($work->body) !!}</div>
   @endif



@stop
