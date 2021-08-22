@extends('layouts.app')
@section('content')
<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Contact Info</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Address:</td>
                                <td>856 Cordia Extension Apt. 356, Lake, US</td>
                            </tr>
                            <tr>
                                <td class="c-o">Phone:</td>
                                <td>(12) 345 67890</td>
                            </tr>
                            <tr>
                                <td class="c-o">Email:</td>
                                <td>info.colorlib@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="c-o">Fax:</td>
                                <td>+(12) 345 67890</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <form action="#" class="contact-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Your Name">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" placeholder="Your Email">
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Your Message"></textarea>
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