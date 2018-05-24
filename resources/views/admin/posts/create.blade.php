@extends('layouts.admin')

@section('styles')

   <link rel="stylesheet" href="/css/summernote.css">
@stop


@section('content')

<!-- https://github.com/njvack/markdown-to-json
https://laracasts.com/discuss/channels/laravel/best-way-to-render-markdown-in-views
https://simplemde.com/
-->

    <h1>Create Post</h1>

    <div class="row">
         {!! Form::open(['method'=>'POST', 'action'=>'Dashboard\AdminPostsController@store', 'files'=> true ]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category_id', [''=>'Choose Categories'] + $categories, null,  ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Thumbnail:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Content:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'id' => 'summernote']) !!}
        </div>

         <div class="form-group">
            {!! Form::label('tags', 'Tags:') !!}
            {!! Form::select('tags[]', $tags, null, ['class'=>'form-control', 'multiple'])!!}
         </div>

        <div class="form-group">
            {!! Form::label('excerpt', 'Excerpt:') !!}
            {!! Form::textarea('excerpt', null, ['class'=>'form-control', 'rows'=> 2 ]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div><!--.row-->

    <div class="row">
        @include('includes.form_error')
    </div>

    @section('scripts')
    <!-- <script src="/js/ckeditor.js"></script> -->

    <script src="/js/summernote.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script> -->

    <script>
     // var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

     //https://stackoverflow.com/questions/21628222/summernote-image-upload
    $('#summernote').summernote({
    height: ($(window).height() - 300)
}).code().replace(/<\/?[^>]+(>|$)/g, "");

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

        //$('#summernote').summernote();

        // $('#summernote').summernote({
        //     height: 300,
        //     onImageUpload: function(files, editor, welEditable) {
        //         sendFile(files[0], editor, welEditable);
        //     }
        // });
        // function sendFile(file, editor, welEditable) {
        //     data = new FormData();
        //     console.log(data);
        //     data.append("file", file);
        //     $.ajax({
        //         data: data,
        //         type: "POST",
        //         url: "/uploader.php",
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(url) {
        //             editor.insertImage(welEditable, url);
        //         }
        //     });
        // }

        // $('#summernote').summernote({
        // onImageUpload: function(files, editor, welEditable) {
        //     sendFile(files[0], editor, welEditable);
        // }
//});

    </script>
    @stop

@stop
