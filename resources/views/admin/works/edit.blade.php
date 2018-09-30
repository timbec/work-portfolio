@extends('layouts.admin')

@section('styles')

   <link rel="stylesheet" href="/css/summernote.css">
@stop

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
            {!! Form::textarea('body', null, ['id' => 'summernote', 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['id' => 'summernote2', 'class'=>'form-control', 'rows'=> 2 ]) !!}
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