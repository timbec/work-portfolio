@extends('layouts.admin')



@section('content')

    <h1>Categories</h1>


    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'Dashboard\AdminCategoriesController@store', 'files'=> true ]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Category:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    @if($categories)
    <div class="col-sm-6">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
            </thead>
            @foreach($categories as $category)
            <tbody>
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{route('admin.categories.edit', $category->id ) }}">Edit</a>
                    </td>
                    <td>
                     {!! Form::open(['method'=>'DELETE', 'action'=> ['Dashboard\AdminCategoriesController@destroy', $category->id]]) !!}


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