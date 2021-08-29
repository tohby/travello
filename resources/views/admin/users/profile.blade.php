@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Staffs</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-image">
                    <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                        alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            <img class="avatar border-gray bg-light" src="{{asset('img/thumbnail.png')}}" alt="...">
                            <h5 class="title">{{Auth::user()->name}}</h5>
                        </a>
                        <p class="description">
                            {{Auth::user()->email}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{action("UsersController@update", Auth::user()->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-5 pr-1">
                                <div class="form-group">
                                    <label>Email (disabled)</label>
                                    <input type="text" class="form-control" disabled="" placeholder="email"
                                        value="{{Auth::user()->email}}" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name"
                                        value="{{Auth::user()->name}}" name="name">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill float-right">Update Profile</button>
                        <div class="clearfix"></div>
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Change Password</h4>
                </div>
                <div class="card-body">
                    <form action="{{action("UsersController@password")}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Old password</label>
                                    <input type="password" class="form-control" placeholder="Old password"
                                        name="old_password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="confirm-password">Confirm password:</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Enter password">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill float-right">Save password</button>
                        <div class="clearfix"></div>
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection