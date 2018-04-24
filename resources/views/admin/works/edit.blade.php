@extends('layouts.admin')


@section('content')

 <a target="_blank" href="">Live Site</a>

    <h1>Edit Work</h1>

    <div class="row">
    <div class="col-sm-3">
        <img src="/images/{{ $work->photo->file }}" alt="" class="img-responsive">
    </div>

    <div class="col-sm-9">
         {!! Form::model($work, ['method'=>'PATCH', 'action'=>['Dashboard\WorksController@update', $work->id], 'files'=> true ]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('work_category', 'Work Category:') !!}
            {!! Form::select('category_id', $work_categories, null,  ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Thumbnail:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Content:') !!}
            {!! Form::textarea('body', null, ['id' => 'body', 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['id' => 'description', 'class'=>'form-control', 'rows'=> 2 ]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Edit work', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
    </div><!--.row-->

    <div class="row">
        @include('includes.form_error')
    </div>

   @section('scripts')

    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <script>
    var simplemde1 = new SimpleMDE({ element: $("#body")[0] });
    var simplemde2 = new SimpleMDE({ element: $("#description")[0] });
    </script>
   
    @stop
   
@stop