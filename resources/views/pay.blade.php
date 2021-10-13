@extends('layouts.app')
@section('content')
<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Payment</h2>
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Room:</td>
                                <td>{{session('room.name')}}</td>
                            </tr>
                            <tr>
                                <td class="c-o">Price:</td>
                                <td>{{session('room.price')}}USD/day</td>
                            </tr>
                            <tr>
                                <td class="c-o">Days:</td>
                                <td>{{\Carbon\Carbon::parse(session('booking.startDate'))->diffInDays(session('booking.endDate'))}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <form action="{{route('checkout')}}" id="payment-form" class="contact-form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <label for="card-element">
                                Credit or debit card
                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <input type="hidden" name="price" value="{{session('room.price')}}">
                            <input type="hidden" name="days"
                                value="{{\Carbon\Carbon::parse(session('booking.startDate'))->diffInDays(session('booking.endDate'))}}">
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit">Submit Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
@endsection