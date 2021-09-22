@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Rooms</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/rooms">Rooms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit room <b>{{$room->name}}</b></li>
            </ol>
        </div>
        <div class="col-lg-2">
            {{-- <a href="#" class="btn btn-default">Create new room</a> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create new room</div>
                <div class="card-body">
                    <form action="{{action("RoomController@update", $room->id)}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Room number:</label>
                            <input type="number" class="form-control" name="roomNo" value="{{$room->roomNo}}"
                                placeholder="Enter room number" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter room name"
                                value="{{$room->name}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Price:</label>
                            <input type="number" class="form-control" name="price" placeholder="Enter room price"
                                value="{{$room->price}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Size:</label>
                            <input type="number" class="form-control" name="size" placeholder="Enter room size"
                                value="{{$room->size}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Capacity:</label>
                            <input type="number" class="form-control" name="capacity" placeholder="Enter room capacity"
                                value="{{$room->capacity}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Services:</label>
                            <input type="text" class="form-control" name="services" placeholder="Enter room services"
                                value="{{$room->services}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image"
                                    value="{{$room->image}}">
                                <label class="custom-file-label" for="customFile">Choose room image</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Description:</label>
                            <textarea rows="3" class="form-control" name="description"
                                placeholder="Enter product description">{{$room->description}}"</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                        @method('PUT')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection