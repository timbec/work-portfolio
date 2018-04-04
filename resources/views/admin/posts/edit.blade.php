@extends('layouts.admin')


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
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
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

    @section('scripts')
    <script src="/js/ckeditor.js"></script>

    <script>
    $(document).ready(function() {
         ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.log(error);
            });

            ClassicEditor.build.plugins.map( plugin => plugin.pluginName );
    });
    </script>
    @stop
   
@stop