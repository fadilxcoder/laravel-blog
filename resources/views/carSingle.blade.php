@extends('layouts.master')

@section('header')
    <header class="masthead" style="background-image: url('{{ asset('storage/assets') }}/img/post-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{ $car->model_name }}</h1>
                        <span class="meta">{{ $car->year }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    {!! nl2br($car->information) !!}
                </div>
            </div>
        </div>
    </article>
@endsection
