@extends('layouts.admin')


@section('content')

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

    <script>
        //$('#summernote').summernote();

        $('#summernote').summernote({
            height: 300,
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }
        });
        function sendFile(file, editor, welEditable) {
            data = new FormData();
            console.log(data);
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "/uploader.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        }

    $(document).ready(function() {

        
    
    });

    // ClassicEditor
    //         .create( document.querySelector( '#body' ), {
    //             ckfinder: {
    //             uploadUrl: '/public/images'
    //         }
    //         })
    //         .catch( error => {
    //             console.log(error);
    //         });
    </script>
    @stop
   
@stop