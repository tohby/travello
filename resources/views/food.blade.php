@extends('layouts.app')
@section('content')
<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 offset-lg-1">
                <form action="{{route('food-order')}}" class="contact-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <select name="food" class="custom-select mb-3">
                                <option selected>Select food menu</option>
                                @foreach ($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-lg-12">
                            <input type="number" class="form-control" name="plates"
                                placeholder="Enter number of plates">
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