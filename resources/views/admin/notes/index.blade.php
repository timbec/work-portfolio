@extends('layouts.admin')


@section('content')

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Tag</th>
            <th>Thumbnail</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
     @if($notes)
        @foreach($notes as $note)
        <tr>
            <td>{{ $note->id }}</td>
            <td>

            {{ $note->title }}

            </td>
            <td>
  
            @foreach ($note->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
          
            </td>
            <td>
            <img height="100" src="/images/{{$note->photo ? $note->photo->file : 'http://via.older.com/350x150' }}" alt="placeholder">
            </td>
            <td>{{ $note->created_at->diffForHumans() }}</td>
            <td>{!! $note->updated_at->diffForHumans() !!}</td>
            <td>
                <a class="btn btn-dark" href="{{ route('admin.notes.edit', $note->id) }}">EDIT</a>
            </td>
             <td>
                  {!! Form::open(['method'=>'DELETE', 'action'=>['Dashboard\NotesController@destroy', $note->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete Note', ['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    @endif
    </tbody>
    </table>


@stop
