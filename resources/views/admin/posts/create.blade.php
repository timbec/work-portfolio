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

@endsection
    @section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    @stop

    @section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

    <script>
    /**
     * https://stackoverflow.com/questions/37839562/summernote-codeblock-button
     */
    var CodeButton = function (context) {
            var ui = $.summernote.ui;

            // create button
            var button = ui.button({
                contents: 'Code block',
                tooltip: 'insert Code',
                click: function () {

                    context.invoke('editor.pasteHTML', '<pre><code class="html">Code here.</code></pre>');
        }
      });

      return button.render();   // return button as jquery object
    }

    var HelloButton = function (context) {
  var ui = $.summernote.ui;

  // create button
  var button = ui.button({
    contents: '<i class="fa fa-child"/> Hello',
    tooltip: 'hello',
    click: function () {
      // invoke insertText method with 'hello' on editor module.
      context.invoke('editor.insertText', 'hello');
    }
  });

  return button.render();   // return button as jquery object
}
//You can see render() which returns jquery object as button.



    //$(document).ready(function() {
      $('#summernote').summernote({
      minHeight: 200,
                    toolbar: [
    					['style', ['style']],
                        ['mybutton', ['insertCode']],
    					['font', ['bold', 'italic', 'underline', 'clear']],
    					['para', ['ul', 'ol']],
    					['height', ['height']],
    					['insert', ['link', 'picture']],
    					['view', ['fullscreen', 'codeview']],
    					['help', ['help']]
    				],

                    buttons: {
                        insertCode: CodeButton
                    }
    });
    //});

    </script>
    @stop
