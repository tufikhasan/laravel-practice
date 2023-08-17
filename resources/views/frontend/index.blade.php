@extends('frontend.app_master')
@section('site_title')
    DevLand - Events
@endsection
@section('main')
    <!-- services-area -->
    <section class="about about__style__two">
        <div class="container">
            <div class="row gx-0 justify-content-center">
                @forelse ($events as $event)
                    <div class="col-lg-4 col-md-6 col-sm-9 flex-row">
                        <div class="blog__post__item">
                            <div class="blog__post__thumb">
                                <a href="{{ route('event', $event->id) }}">
                                    <img class="event_image"
                                        src="{{ !empty($event->image) ? asset('upload/event/' . $event->image) : asset('upload/no_image.jpg') }}"
                                        alt="{{ $event->title }}">
                                </a>
                                <div class="blog__post__tags">
                                    <a href="{{ route('event', $event->id) }}">{{ $event['event_category']['name'] }}</a>
                                </div>
                            </div>
                            <div class="blog__post__content">
                                <h3 class="title">
                                    <a href="{{ route('event', $event->id) }}">{{ $event->title }}</a>
                                </h3>
                                <span class="date"><i class="far fa-calendar-alt"></i> {{ $event->date }}</span>
                                <span class="date"><i class="far fa-clock"></i>
                                    {{ Carbon\Carbon::parse($event->time)->format('H:m A') }}</span>
                                <span class="date"><i class="fas fa-map-marker-alt"></i> {{ $event->location }}</span>
                                <a href="{{ route('event', $event->id) }}" class="read__more">Details</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <img src="{{ asset('no_data.jpg') }}">
                @endforelse
                <div class="pagination-wrap">
                    {{ $events->links('vendor.pagination.custom_pagination') }}
                </div>

            </div>
        </div>
    </section>
@endsection
