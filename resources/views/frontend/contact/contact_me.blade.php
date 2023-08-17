@php
    $data = App\Models\Footer::find(1);
@endphp
@extends('frontend.app_master')
@section('site_title')
    Contact - Personal Portfolio
@endsection
@section('main')
    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Contact us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                @foreach ($multi_image as $image)
                    <li><img src="{{ url('upload/multi/' . $image->image) }}" alt=""></li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-map -->
    <div id="contact-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d40.6880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd"
            allowfullscreen loading="lazy"></iframe>
    </div>
    <!-- contact-map-end -->

    <!-- contact-area -->
    <div class="contact-area">
        <div class="container">
            <form id="contactForm" class="contact__form" method="post" action="{{ route('contact.us') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                            required>

                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Enter your mail*"
                            name="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" id="subject" placeholder="Enter your subject*"
                            name="subject" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" id="budget" placeholder="Your Budget*" name="budget"
                            required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <textarea class="form-control" name="message" id="message" placeholder="Enter your massage*" required></textarea>
                    </div>
                </div>

                <button type="submit" class="btn mt-5">send massage</button>
            </form>
        </div>
    </div>
    <!-- contact-area-end -->

    <!-- contact-info-area -->
    <section class="contact-info-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon01.png') }}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">address line</h4>
                            <span>{{ $data->address }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon02.png') }}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Phone Number</h4>
                            <span>{{ $data->number }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon03.png') }}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Mail Address</h4>
                            <span>{{ $data->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-area-end -->

    <!-- Say-Hello -->
    @include('frontend.components.say_hello', [
        'sayHelloSectionCss' => 'homeContact homeContact__style__two',
    ])
    <!-- Say-Hello -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#contactForm').validate({
                rules: {
                    name: 'required',
                    email: 'required',
                    subject: 'required',
                    budget: 'required',
                    message: 'required'
                },
                messages: {
                    name: 'Please enter your name',
                    email: 'Please enter your email',
                    subject: 'Please enter your subject',
                    budget: 'Please enter your budget',
                    message: 'Please enter your message'
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                }
            });
        });
    </script>
@endsection
