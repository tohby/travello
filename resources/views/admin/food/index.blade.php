@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Food Menu</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Food Menu</li>
            </ol>
        </div>
        <div class="col-lg-2">
            <a href="/admin/food/create" class="btn btn-default float-right">Create new Menu</a>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-12">
            @foreach ($food as $food_item)
            <div class="card p-1">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="ml-3">
                            <h4> {{$food_item->name}} </h4>
                            <p> {{$food_item->description}} </p>
                        </div>

                        <div class="ml-auto h6">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a href="/admin/food/{{ $food_item->id }}/edit"
                                        class="dropdown-item btn btn-default">Edit</a>
                                    <form method="POST" action="{{ route('food.destroy',$food_item->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="dropdown-item text-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-end mb-5">
        {{ $food->links() }}
    </div>
</div>

@endsection