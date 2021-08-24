@extends('layouts.app')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Our Rooms</h2>
                    <div class="bt-option">
                        <a href="/">Home</a>
                        <span>Rooms</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            @if ($rooms->count() > 0)
            @foreach ($rooms as $room)
            <div class="col-lg-4 col-md-6">
                <div class="room-item">
                    <img src="/storage/rooms/{{$room->image}}" alt="" class="top-image">
                    <div class="ri-text">
                        <h4>{{$room->name}}</h4>
                        <h3>{{$room->price}}$<span>/Pernight</span></h3>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>{{$room->size}} ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion {{$room->capacity}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>{{$room->services}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="primary-btn">More Details</a>
                    </div>
                </div>
            </div>
            @endforeach

            @endif

            <div class="col-lg-12">
                <div class="room-pagination float-right">
                    {{$rooms->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Rooms Section End -->
@endsection