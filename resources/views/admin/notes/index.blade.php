@extends('layouts.admin')


@section('content')

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Tag</th>
            <th>Excerpt</th>
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
            <td>{{ $note->body }}</td>
            <td>{{ $note->created_at->diffForHumans() }}</td>
            <td>{{ $note->updated_at->diffForHumans() }}</td>
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
