@extends('layouts.admin')


@section('content')

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Photo</th>
            <th>Category</th>
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
            <td>
            <a target="_blank" href="{{ route('blog.post', $post->slug) }}">
            {{ $post->title }}
            </a>
            </td>
            <td>
            <img height="100" src="/images/{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/350x150' }}" alt="">
            </td>
            <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
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

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{ $posts->render() }}
        </div>
    </div>

@stop