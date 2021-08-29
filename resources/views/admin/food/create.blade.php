@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Food Menu</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/food">Food menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Menu</li>
            </ol>
        </div>
        <div class="col-lg-2">
            {{-- <a href="#" class="btn btn-default">Create new room</a> --}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create new Menu</div>
                <div class="card-body">
                    <form action="{{action("FoodController@store")}}" method="post">
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
                            <label for="description">Description:</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" placeholder="Enter description"> </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                placeholder="Enter price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection