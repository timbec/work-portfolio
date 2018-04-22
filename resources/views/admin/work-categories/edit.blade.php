@extends('layouts.admin')

@section('content')


<div class="col-sm-6">
<h1>Edit {{ $work_category->name }}</h1>
    {!! Form::model($work_category, ['method'=>'PATCH', 'action'=>['Dashboard\AdminWorkCategoriesController@update', $work_category->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $work_category->name, ['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::submit('Update Work Category', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}
</div>



@stop