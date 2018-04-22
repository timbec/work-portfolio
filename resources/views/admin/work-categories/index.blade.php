@extends('layouts.admin')



@section('content')

    <h1>Work Categories</h1>


    <div class="col-sm-6">
        {!! Form::open(['method'=>'POST', 'action'=>'Dashboard\AdminWorkCategoriesController@store', 'files'=> true ]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Work Category:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::submit('Create Work Category', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    @if($work_categories)
    <div class="col-sm-6">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
            </thead>
            @foreach($work_categories as $work_category)
            <tbody>
                <tr>
                    <td>{{ $work_category->id }}</td>
                    <td>{{ $work_category->name }}</td>
                    <td>{{ $work_category->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{route('admin.work-categories.edit', $work_category->id ) }}">Edit</a>
                    </td>
                    <td>
                     {!! Form::open(['method'=>'DELETE', 'action'=> ['Dashboard\AdminWorkCategoriesController@destroy', $work_category->id]]) !!}


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