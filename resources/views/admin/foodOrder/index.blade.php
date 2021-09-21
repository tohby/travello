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

        </div>
    </div>
    <div class="d-flex justify-content-end mb-5">
        {{-- {{ $food->links() }} --}}
    </div>
</div>

@endsection