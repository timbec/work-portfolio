@extends('layouts.admin')


@section('content')

    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Created</th>
            <th>URL</th>
        </tr>
    </thead>
    <tbody>
     @if($photos)
        @foreach($photos as $photo)
        <tr>
            <td>{{ $photo->id }}</td>
            <td>
            <img height="100" src="/images/{{ $photo->file }}" /></td>
            <td>
            {{ $photo->created_at->diffForHumans() }}
            </td>
            <td>
                <a href="/images/{{ $photo->file }}">/images/{{ $photo->file }}</a>
            </td>
             <td>
                {!! Form::open(['method'=>'DELETE', 'action'=>['Dashboard\AdminMediaController@destroy', $photo->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete Image', ['class'=>'btn btn-danger']) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    @endif
    </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{ $photos->render() }}
        </div>
    </div>
@stop
