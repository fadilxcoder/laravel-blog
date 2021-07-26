@extends('layouts.master')

@section('header')
<header class="masthead" style="background-image: url('{{ asset('storage/assets') }}/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Laravel Blog</h1>
                    <span class="subheading">LV8</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $_posts)
            <div class="post-preview">
                <a href="{{ route('singlePost', $_posts->id) }}">
                    <h2 class="post-title">
                        {{ $_posts->title }}
                    </h2>
                </a>
                <p class="post-meta">Posted by <a href="#">{{ $_posts->user->name }}</a> on {{ date_format($_posts->created_at, 'F d, Y') }} | <i class="fa fa-comment" aria-hidden="true"></i> {{ $_posts->comments->count() }}</p>
            </div>
            <hr>
            @endforeach
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>
@endsection
