@extends('layouts.admin')

@section('styles')

   <link rel="stylesheet" href="/css/summernote.css">
@stop

@section('content')
      <h1>Create A Note</h1>

      {!! Form::open(['method'=>'POST','action'=>'Dashboard\NotesController@store']) !!}
         <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('body', 'Content:') !!}
            {!! Form::textarea('body', null, ['id' => 'summernote', 'class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('tags', 'Tags:') !!}
            {!! Form::select('tags[]', $tags, null, ['class'=>'form-control', 'multiple'])!!}
         </div>

         <div class="form-group">
            {!! Form::submit('Create Note', ['class'=>'btn btn-primary']) !!}
         </div>

      {!! Form::close() !!}

       @if(count($errors)>0)
      <div class="alert alert-danger">
         <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
         </ul>
      </div>
      @endif
@stop

   @section('scripts')

   <script src="/js/summernote.js"></script>

   <script type="text/javascript">

   $('#summernote').summernote({
      height: ($(window).height() - 300);
   });

}

   </script>

    @stop
