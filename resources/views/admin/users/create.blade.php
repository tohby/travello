@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Rooms</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/users">Staffs</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Staff</li>
            </ol>
        </div>
        <div class="col-lg-2">
            {{-- <a href="#" class="btn btn-default">Create new room</a> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create new staff</div>
                <div class="card-body">
                    <form action="{{action("UsersController@store")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Enter user name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Enter user email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Enter password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm password:</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection