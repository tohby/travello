@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Food Order</div>
    <div class="row">
        <div class="col-lg-8">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Food Order</li>
            </ol>
        </div>
        <div class="col-lg-4">
            <a href="/admin/food-order/create" class="btn btn-default float-right mr-4">Create Order</a>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    {{-- <p class="card-category">Here is a subtitle for this table</p> --}}
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Food</th>
                                <th>Number of plates</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>#{{$order->id}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->food->name}}</td>
                                <td>{{$order->plates}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mb-5">
        {{ $orders->links() }}
    </div>
</div>

@endsection