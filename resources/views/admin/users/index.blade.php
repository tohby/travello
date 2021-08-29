@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Staffs</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Staffs</li>
            </ol>
        </div>
        <div class="col-lg-2">
            <a href="/admin/users/create" class="btn btn-default float-right">Create new Staff</a>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-12">
            @foreach ($users as $user)
            <div class="card p-1">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="ml-3">
                            <h5> {{$user->name}} </h5>
                            <p> {{$user->email}} </p>
                        </div>
                        @unless (Auth::user()->id === $user->id)
                        <div class="ml-auto h6">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <form method="POST" action="{{ route('users.destroy',$user->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="dropdown-item text-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endunless
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-end mb-5">
        {{ $users->links() }}
    </div>
</div>

@endsection