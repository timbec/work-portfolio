@extends('layouts.admin')


@section('content')

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Body</th>
            <th>Excerpt</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
     @if($posts) 
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>
            <img height="50" src="{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/350x150' }}" alt="">
            </td>
            <td>{{ $post->category_id }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ $post->excerpt }}</td>
            <td>{{ $post->created_at->diffForHumans() }}</td>
            <td>{{ $post->updated_at->diffForHumans() }}</td>
        </tr>
        @endforeach
    @endif
    </tbody>
    </table>


@stop