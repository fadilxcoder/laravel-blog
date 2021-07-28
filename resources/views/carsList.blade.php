@extends('layouts.master')

@section('header')
    <header class="masthead" style="background-image: url('{{ asset('storage/assets') }}/img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Laravel Cars</h1>
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
                @foreach($cars as $_cars)
                    <div class="post-preview">
                        <a href="{{ route('carSingle', $_cars->id) }}">
                            <h2 class="post-title">
                                {{ $_cars->model_name }}
                            </h2>
                        </a>
                        <p class="post-meta">Build in {{ $_cars->year }}</p>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
