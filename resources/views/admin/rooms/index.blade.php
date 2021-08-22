@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Rooms</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Rooms</li>
            </ol>
        </div>
        <div class="col-lg-2">
            <a href="/admin/rooms/create" class="btn btn-default">Create new room</a>
        </div>
    </div>
</div>

@endsection