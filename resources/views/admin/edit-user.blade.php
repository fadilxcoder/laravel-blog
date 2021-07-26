@extends('layouts.admin')

@section('title') Edit User - {{ $user->name }} @endsection

@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    {{ $user->name }}
                </div>
                <form action="{{ route('submitUserEdit', $user->id) }}" method="post">
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
                                    <label for="normal-input" class="form-control-label">Name</label>
                                    <input id="normal-input" name="name" class="form-control" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="normal-input" class="form-control-label">Email</label>
                                    <input id="normal-input" name="email" class="form-control" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="single-select">Set as Admin ?</label>
                                    <select id="single-select" class="form-control" name="admin">
                                        <option value="0" {{ $user->admin == FALSE ? 'selected' : '' }} >NO</option>
                                        <option value="1" {{ $user->admin == TRUE ? 'selected' : '' }} >YES</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="single-select">Set as Author ?</label>
                                    <select id="single-select" class="form-control" name="author">
                                        <option value="0" {{ $user->author == FALSE ? 'selected' : '' }} >NO</option>
                                        <option value="1" {{ $user->author == TRUE ? 'selected' : '' }} >YES</option>
                                    </select>
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