@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Food order</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/food-order">Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Order</li>
            </ol>
        </div>
        <div class="col-lg-2">
            {{-- <a href="#" class="btn btn-default">Create new room</a> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create order</div>
                <div class="card-body">
                    <form action="{{action("FoodOrderController@store")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Capacity:</label>
                            <select name="user" class="custom-select mb-3">
                                <option selected>Select User</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Capacity:</label>
                            <select name="food" class="custom-select mb-3">
                                <option selected>Select food menu</option>
                                @foreach ($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Number of plates:</label>
                            <input type="number" class="form-control" name="plates"
                                placeholder="Enter number of plates">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection