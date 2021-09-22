@extends('layouts.master')

@section('content')

<div class="container-fluid">
    <div class="h4">Bookings</div>
    <div class="row">
        <div class="col-lg-10">
            <ol class="breadcrumb bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Bookings</li>
            </ol>
        </div>
        <div class="col-lg-2">
            {{-- <a href="/admin/food/create" class="btn btn-default float-right">Create new Menu</a> --}}
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
                                <th>Room</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                            <tr>
                                <td>#{{$booking->id}}</td>
                                <td>{{$booking->user->name}}</td>
                                <td>Room #{{$booking->room->id}}</td>
                                <td>{{$booking->startDate}} - {{$booking->endDate}}</td>
                                <td>@if ($booking->status === 0)
                                    <p class="text-primary">Awaiting confirmation</p>
                                    @elseif($booking->status === 1)
                                    <p class="text-success"> Confirmed</p>
                                    @else
                                    <p class="text-danger"> Cancelled</p>
                                    @endif</td>
                                <td>
                                    @if ($booking->status === 0)
                                    <form method="POST" action="{{ route('bookings.update',$booking->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="status" value="1">
                                        <button class="btn btn-default mr-2" type="submit">Confirm</button>
                                        @method('PUT')
                                    </form>
                                    <form method="POST" action="{{ route('bookings.update',$booking->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="status" value="2">
                                        <button class="btn btn-danger" type="submit">Cancel</button>
                                        @method('PUT')
                                    </form>
                                    @endif
                                </td>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mb-5">
        {{ $bookings->links() }}
    </div>
</div>

@endsection