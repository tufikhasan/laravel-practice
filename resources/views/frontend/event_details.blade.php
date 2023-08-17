@extends('frontend.app_master')
@section('site_title')
    DevLand - Events Details
@endsection
@section('main')
    <!-- services-area -->
    <section class="services__details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="services__details__thumb">
                        <img src="{{ !empty($event->image) ? asset('upload/event/' . $event->image) : asset('upload/no_image.jpg') }}"
                            alt="Momma Fashion Mobile">
                    </div>
                    <div class="services__details__content">
                        <h2 class="title">{{ $event->title }}</h2>
                        <div>{!! $event->description !!}</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="services__sidebar">
                        <div class="widget">
                            <h5 class="title">Event Information</h5>
                            <ul class="sidebar__contact__info">
                                <li><span>Date :</span> {{ $event->date }}</li>
                                <li><span>Time :</span> {{ Carbon\Carbon::parse($event->time)->format('H:m A') }}</li>
                                <li><span>Location :</span> {{ $event->location }}</li>
                                <li><span>Total Reservation :</span> {{ count($event['reservation']) }}</li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="title">Register Event</h5>
                            @if ($errors)
                                @foreach ($errors->all() as $error)
                                    <span class="text-danger">{{ $error }}</span><br>
                                @endforeach
                            @endif
                            <form action="{{ route('reservation') }}" class="sidebar__contact" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $event->id }}" name="event_id">
                                <input type="text" placeholder="Enter name*" required name="name">
                                <input type="email" placeholder="Enter your mail*" required name="email">
                                <input type="tel" placeholder="Enter your mobile number*" required name="mobile">
                                <button type="submit" class="btn">Reservation</button>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->
@endsection
