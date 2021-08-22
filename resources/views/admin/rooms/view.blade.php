@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Rooms</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/rooms">Rooms</a></li>
                <li class="breadcrumb-item active" aria-current="page">View room <b>{{$room->name}}</li>
            </ol>
        </div>
        <div class="col-lg-2">
            <form method="POST" action="{{ route('rooms.destroy',$room->id) }}">
                <a href="{{$room->id}}/edit" class="btn btn-default ">Edit</a>
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button class="btn btn-danger float-right" type="submit">Delete</button>
            </form>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card p-1" style="width: 60rem;">
                <img src="/storage/rooms/{{$room->image}}" alt="{{$room->name}}" class="card-img-top full">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold">{{$room->name}}</h4>
                    <p class="font-weight-bold">{{$room->price}}$/Night</p>
                    <p>{{$room->description}}</p>
                    <p>Size: {{$room->size}} ft</p>
                    <p>Capacity: {{$room->capacity}} Person(s)</p>
                    <p>Services : {{$room->services}}</p>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection