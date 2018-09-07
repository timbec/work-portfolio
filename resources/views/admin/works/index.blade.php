@extends('layouts.admin')


@section('content')

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Tag</th>
            <th>Excerpt</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
     @if($works)
        @foreach($works as $work)
        <tr>
            <td>{{ $work->id }}</td>
            <td>

            {{ $work->title }}

            </td>
            <td>
            <img height="100" src="/images/{{$work->photo ? $work->photo->file : 'http://via.older.com/350x150' }}" alt="">placeh
            </td>
            <td>{{ $work->work_category ? $work->work_category->name : 'Uncategorized' }}</td>
            <td>
            @foreach ($work->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
            </td>
            <td>{{ $work->description }}</td>
            <td>{{ $work->created_at->diffForHumans() }}</td>
            <td>{{ $work->updated_at->diffForHumans() }}</td>
            <td>
                <a class="btn btn-dark" href="{{ route('admin.works.edit', $work->id) }}">EDIT</a>
            </td>
             <td>
                  {!! Form::open(['method'=>'DELETE', 'action'=>['Dashboard\WorksController@destroy', $work->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete work', ['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    @endif
    </tbody>
    </table>


@stop
