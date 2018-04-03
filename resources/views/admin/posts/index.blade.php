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
            <img height="100" src="/images/{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/350x150' }}" alt="">
            </td>
            <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
            <td>{{ str_limit($post->body, 50) }}</td>
            <td>{{ $post->excerpt }}</td>
            <td>{{ $post->created_at->diffForHumans() }}</td>
            <td>{{ $post->updated_at->diffForHumans() }}</td>
            <td>
                <a class="btn btn-dark" href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
            </td>
             <td>
                  {!! Form::open(['method'=>'DELETE', 'action'=>['Dashboard\AdminPostsController@destroy', $post->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
                </div>
            </td>
        </tr>
        @endforeach
    @endif
    </tbody>
    </table>


@stop