@extends('layouts.admin')

@section('styles')

   <link rel="stylesheet" href="/css/summernote.css">
@stop

@section('content')
      <h1>Create Work</h1>

      {!! Form::open(['method'=>'POST','action'=>'Dashboard\WorksController@store', 'files'=>true]) !!}
         <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('body', 'Content:') !!}
            {!! Form::textarea('body', null, ['id' => 'summernote', 'class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['id' => 'summernote2', 'class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('work_category_id', 'Work Category:') !!}
            {!! Form::select('work_category_id', array('' => 'Choose Work Categories') + $work_categories, null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('photo_id', 'Thumbnail:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control', 'rows'=>5])!!}
         </div>

         <div class="form-group">
            {!! Form::label('website_link', 'Website Link:') !!}
            {!! Form::text('website_link', null, ['class'=>'form-control'])!!}
         </div>


         <div class="form-group">
            {!! Form::label('tags', 'Tags:') !!}
            {!! Form::select('tags[]', $tags, null, ['class'=>'form-control', 'multiple'])!!}
         </div>

         <div class="form-group">
            {!! Form::submit('Create Work', ['class'=>'btn btn-primary']) !!}
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
      height: ($(window).height() - 300),
      callbacks: {
         onImageUpload: function(image) {
              uploadImage(image[0]);
         }
      }
   });

   $('#summernote2').summernote({
      height: ($(window).height() - 100)
   });

   function uploadImage(image) {
      var data = new FormData();
      console.log(data);
      data.append("image", image);
      $.ajax({
         url: '/images',
         cache: false,
         contentType: false,
         processData: false,
         data: data,
         type: "post",
         success: function(url) {
              var image = $('<img>').attr('src', 'http://' + url);
              $('#summernote').summernote("insertNode", image[0]);
         },
         error: function(data) {
              console.log(data);
         }
      });
   }

   </script>

    @stop
