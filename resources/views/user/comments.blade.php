@extends('layouts.admin')

@section('title') User Comments @endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        User Comments
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Post</th>
                                        <th>Content</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(Auth::user()->comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td class="text-nowrap"><a href="{{ route('singlePost', $comment->id) }}">{{ $comment->post->title }}</a></td>
                                        <td>{{ $comment->content }}</td>
                                        <td>{{ $comment->readableDate($comment->created_at) }}</td>
                                        <td>
                                            <form id="delete-comment-{{ $comment->id }}" action="{{ route('deleteComment', $comment->id) }}" method="post">@csrf</form>
                                            <button class="btn btn-danger" onclick="document.getElementById('delete-comment-{{ $comment->id }}').submit()">X</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
