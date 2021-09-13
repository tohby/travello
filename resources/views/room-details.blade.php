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

<!-- Room Details Section Begin -->
<section class="room-details-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="room-details-item">
                    <img src="/storage/rooms/{{$room->image}}" alt="">
                    <div class="rd-text">
                        <div class="rd-title">
                            <h3>{{$room->name}}</h3>
                            <div class="rdt-right">
                                {{-- <a href="#">Book room</a> --}}
                            </div>
                        </div>
                        <h2>{{$room->price}}$<span>/Pernight</span></h2>
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
                        <p class="f-para">{{$room->description}}</p>
                    </div>
                </div>

                <div class="rd-reviews">
                    <h4>Reviews</h4>
                    @if (count($room->reviews) > 0)
                    @foreach ($room->reviews as $review)
                    <div class="review-item">
                        <div class="ri-text">
                            <span>{{$review->created_at->diffForHumans()}}</span>
                            <h5>{{$review->user->name}}</h5>
                            <p>{{$review->comment}}</p>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="review-item">
                        <div class="ri-text">
                            <p>There are no reviews for this room.</p>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="review-add">
                    <h4>Add Review</h4>

                    @if (Auth::check())
                    <form action="{{action("FeedbackController@store")}}" class="ra-form" method="post">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="roomId" value="{{$room->id}}">
                            <div class="col-lg-12">
                                <textarea placeholder="Your Review" name="comment"></textarea>
                                <button type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <div class="review-item">
                        <div class="ri-text">
                            <h5>Please sign in to create a review.</h5>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-lg-4">
                <div class="room-booking">
                    @if (Auth::check())
                    <h3>Your Reservation</h3>
                    <form action="{{action("BookingController@store")}}" method="POST">
                        @csrf
                        <div class="check-date">
                            <label for="date-in">Check In:</label>
                            <input type="text" class="date-input" name="dateIn">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Check Out:</label>
                            <input type="text" class="date-input" name="dateOut">
                            <i class="icon_calendar"></i>
                        </div>
                        <input type="hidden" name="roomId" value="{{$room->id}}">
                        <button type="submit">Create Reservation</button>
                    </form>
                    @else
                    <h3>You are not signed in</h3>
                    <p>Please sign in to create a reservation</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Room Details Section End -->
@endsection