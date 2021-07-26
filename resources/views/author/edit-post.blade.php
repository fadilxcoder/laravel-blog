@extends('layouts.admin')

@section('title') Edit Post - {{ $post->title }} @endsection

@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    New Post - {{ $post->title }}
                </div>
                <form action="{{ route('submitEditPost', $post->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Title</label>
                                    <input id="normal-input" name="title" class="form-control" placeholder="Input text here ..." value="{{ $post->title }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="textarea">Content</label>
                                    <textarea id="textarea" name="content" class="form-control" rows="12" placeholder="Input content here ...">{{ $post->content }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary">Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection