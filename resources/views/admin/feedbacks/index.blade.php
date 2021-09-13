@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Feedbacks</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Feedbacks</li>
            </ol>
        </div>
        <div class="col-lg-2">
            {{-- <a href="/admin/rooms/create" class="btn btn-default float-right">Create new room</a> --}}
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-12">
            @foreach ($feedbacks as $feedback)
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="ml-3">
                            <h6 class="text-muted">{{$feedback->created_at->diffForHumans()}}</h6>
                            <h4> {{$feedback->user->name}} - <small>Room-{{$feedback->room->id}}</small></h4>
                            <p>{{$feedback->comment}} </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-end mb-5">
        {{ $feedbacks->links() }}
    </div>
</div>

@endsection