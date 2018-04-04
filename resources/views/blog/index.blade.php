@extends('layouts.front-end')

@section('content')


    @if($posts) 
        @foreach($posts as $post)
            <li>
            <a href="{{ route('blog.post', $post->slug) }}">
                 {{ $post->title }}
            </a>
            <p>{{ $post->excerpt }}</p>
            </li>
        @endforeach
    @endif



@stop