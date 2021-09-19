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
            <a href="/admin/rooms/create" class="btn btn-default float-right">Create new room</a>
        </div>
    </div>
    <div class="row my-4">
        @foreach ($rooms as $room)
        <div class="col-lg-4">
            <div class="card p-1">
                <img src="/storage/rooms/{{$room->image}}" alt="{{$room->name}}" class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold">{{$room->name}}</h4>
                    <p class="font-weight-bold">Room {{$room->id}}</p>
                    <p class="font-weight-bold">{{$room->price}}$/Night</p>
                    <p>{{Str::of($room->description)->limit(150)}}</p>
                    <div class="mt-3 float-right row">
                        <a class="btn btn-default mr-2" href="/admin/rooms/{{ $room->id }}">View</a>
                        <a class="btn btn-default mr-2" href="/admin/rooms/{{ $room->id }}/edit">Edit</a>
                        <form method="POST" action="{{ route('rooms.destroy',$room->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end mb-5">
        {{ $rooms->links() }}
    </div>
</div>

@endsection