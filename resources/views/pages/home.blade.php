@extends('layouts.front-end')



@section('content')

    <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                     This is the Home Page
                </div>

                <div id="works">
                <h2>Works</h2>
                 @if($works)
                    @foreach($works as $work)
                        {{$work->title}}
                    @endforeach
                @endif
                </div>
        </div>




@stop