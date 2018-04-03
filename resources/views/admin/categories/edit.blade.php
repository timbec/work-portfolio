@extends('layouts.admin')

@section('content')


<div class="col-sm-6">
<h1>Edit {{ $category->name }}</h1>
    {!! Form::model($category, ['method'=>'PATCH', 'action'=>['Dashboard\AdminCategoriesController@update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
</div>



@stop