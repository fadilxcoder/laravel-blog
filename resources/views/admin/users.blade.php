@extends('layouts.admin')

@section('title') Admin Users @endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Admin Users
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Posts</th>
                                        <th>Comments</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->posts->count() }}</td>
                                        <td>{{ $user->comments->count() }}</td>
                                        <td>{{ $comment->readableDate($user->created_at) }}</td>
                                        <td>{{ $comment->readableDate($user->updated_at) }}</td>
                                        <td>
                                            <a class="btn btn-block btn-warning" href="{{ route('adminUserEdit', $user->id) }}"><i class="fa fa-pencil-alt"></i></a><br>
                                            @if($user->admin == FALSE)
                                            <form id="delete-user-{{ $user->id }}" action="{{ route('adminDeleteUser', $user->id) }}" method="post">@csrf</form>
                                            <button class="btn btn-block btn-danger" onclick="document.getElementById('delete-user-{{ $user->id }}').submit()"><i class="fa fa-trash"></i></button>
                                            @endif
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
