@extends('layouts.admin')



@section('content')

    <h1>Tags</h1>


    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'Dashboard\AdminTagsController@store', 'files'=> true ]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Tag:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::submit('Create Tag', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    @if($tags)
    <div class="col-sm-6">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
            </thead>
            @foreach($tags as $tag)
            <tbody>
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{route('admin.tags.edit', $tag->id ) }}">Edit</a>
                    </td>
                    <td>
                     {!! Form::open(['method'=>'DELETE', 'action'=> ['Dashboard\AdminTagsController@destroy', $tag->id]]) !!}


                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
                    </div>
                     {!! Form::close() !!}
                    </td>
                </tr>
            </tbody>
             @endforeach
        </table>
    </div>
    @endif

@stop