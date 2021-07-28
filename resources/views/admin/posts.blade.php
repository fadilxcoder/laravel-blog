@extends('layouts.admin')

@section('title') Admin Posts @endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Admin Posts
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
                                        <th>Title</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Comments</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($totalPost as $posts)
                                    <tr>
                                        <td>{{ $posts->id }}</td>
                                        <td class="text-nowrap"><a href="{{ route('singlePost', $posts->id) }}">{{ $posts->title }}</a></td>
                                        <td>{{ $posts->readableDate($posts->created_at) }}</td>
                                        <td>{{ $posts->readableDate($posts->updated_at) }}</td>
                                        <td>{{ $posts->comments->count() }}</td>

                                        <td>
                                            <a class="btn btn-block btn-warning" href="{{ route('adminPostEdit', ['id' => $posts->id, 'title' => uri_beautifier($posts->title) ]) }}"><i class="fa fa-pencil-alt"></i></a><br>
                                            <form id="delete-post-{{ $posts->id }}" action="{{ route('adminDeletePost', $posts->id) }}" method="post">@csrf</form>
                                            <button class="btn btn-block btn-danger" onclick="document.getElementById('delete-post-{{ $posts->id }}').submit()"><i class="fa fa-trash"></i></button>
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
