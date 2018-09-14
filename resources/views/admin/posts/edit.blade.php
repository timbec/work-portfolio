@extends('layouts.admin')

@section('styles')

   <link rel="stylesheet" href="/css/summernote.css">
@stop


@section('content')

 <a target="_blank" href="{{ route('blog.post', $post->slug) }}">Live Site</a>

    <h1>Edit Post</h1>

    <div class="row">
    <div class="col-sm-3">
        <img src="/images/{{ $post->photo->file }}" alt="" class="img-responsive">
    </div>

    <div class="col-sm-9">
         {!! Form::model($post, ['method'=>'PATCH', 'action'=>['Dashboard\AdminPostsController@update', $post->id], 'files'=> true ]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Category:') !!}
            {!! Form::select('category_id', $categories, null,  ['class'=>'form-control']) !!}
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
            {!! Form::submit('Edit Post', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
    </div><!--.row-->

    <div class="row">
        @include('includes.form_error')
    </div>
@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

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
