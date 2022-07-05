@extends('layouts.admin')
@section('title', 'Admin - Main')
@section('content')
    <div class="row g-3 mb-3">
        <div class="col-xxl-8 col-lg-12">
            <div class="card h-100">
                <div class="bg-holder bg-card" style="background-image:url(/assets/img/icons/spot-illustrations/corner-3.png);"></div>
                <!--/.bg-holder-->
                <div class="card-header z-index-1">
                    <h3 class="text-primary mb-3">Welcome to Key-notion Admin Panel! </h3>
                    <h6 class="text-600">Here are some quick links for you  </h6>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-lg-12">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(/assets/img/icons/spot-illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                    <h4>Users</h4>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                         data-countup="{&quot;endValue&quot;:58.386,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">{{$users_count}}</div>
                    <a class="fw-semi-bold fs--1 text-nowrap" href="{{route('users.index')}}">See all
                        <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true"
                             focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)">
                                <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                                                                  transform="translate(-128 -256)"></path></g></g></svg></a>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-lg-12">
        <div class="row g-3 mb-3">
            <div class="col-sm-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(/assets/img/icons/spot-illustrations/corner-1.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <h4>Events</h4>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                             data-countup="{&quot;endValue&quot;:58.386,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">{{$event_count}}</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="{{route('event.index')}}">See all
                            <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true"
                                 focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)">
                                    <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                                                                      transform="translate(-128 -256)"></path></g></g></svg></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(/assets/img/icons/spot-illustrations/corner-4.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <h4>Tickets</h4>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                             data-countup="{&quot;endValue&quot;:58.386,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">{{$ticket_count}}</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="{{route('ticket.index')}}">See all
                            <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true"
                                 focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)">
                                    <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                                                                      transform="translate(-128 -256)"></path></g></g></svg></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(/assets/img/icons/spot-illustrations/corner-4.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <h4>Sponsors</h4>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                             data-countup="{&quot;endValue&quot;:58.386,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">{{$sponsor_count}}</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="{{route('sponsor.index')}}">See all
                            <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true"
                                 focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)">
                                    <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                                                                      transform="translate(-128 -256)"></path></g></g></svg></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(/assets/img/icons/spot-illustrations/corner-1.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <h4>Partners</h4>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                             data-countup="{&quot;endValue&quot;:58.386,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">{{$partner_count}}</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="{{route('partner.index')}}">See all
                            <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true"
                                 focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)">
                                    <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                                                                      transform="translate(-128 -256)"></path></g></g></svg></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(/assets/img/icons/spot-illustrations/corner-1.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <h4>Vacancies</h4>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                             data-countup="{&quot;endValue&quot;:58.386,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">{{$vacancy_count}}</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="{{route('vacancy.index')}}">See all
                            <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true"
                                 focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)">
                                    <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                                                                      transform="translate(-128 -256)"></path></g></g></svg></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(/assets/img/icons/spot-illustrations/corner-4.png);"></div>
                    <!--/.bg-holder-->
                    <div class="card-body position-relative">
                        <h4>News</h4>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                             data-countup="{&quot;endValue&quot;:58.386,&quot;decimalPlaces&quot;:2,&quot;suffix&quot;:&quot;k&quot;}">{{$news_count}}</div>
                        <a class="fw-semi-bold fs--1 text-nowrap" href="{{route('news.index')}}">See all
                            <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true"
                                 focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)">
                                    <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                                                                      transform="translate(-128 -256)"></path></g></g></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card overflow-hidden" >
<div class="card-body position-relative">
    <div class="row justify-content-center justify-content-sm-between">
        <div class="col-sm-auto text-center">
            <h5 class="d-inline-block">Events</h5>
        </div>
    </div>
</div>
<div class="card-body fs--1">
    <div class="row">
        @foreach($events as $event)
            <div class="col-md-6 h-100">
                <div class="d-flex btn-reveal-trigger">
                    <div class="calendar" style="width: auto !important;">
                        <span class="calendar-month"></span>
                        <span class="calendar-day">{{$event['start_date']}}</span>
                    </div>
                    <div class="flex-1 position-relative ps-3">
                        <h6 class="fs-0 mb-0"><a href="{{route('event.edit' , $event['id'])}}">{{$event['title']}}</a></h6>
                        <p class="text-1000 mb-0">{{$event['start_date']}} - {{$event['end_date']}}</p>{{$event->country->name}} , {{$event->city->name}}, {{$event['address']}}<div class="border-dashed-bottom my-3"></div>
                    </div>
                </div>
            </div>
        @endforeach
            <a class="fw-semi-bold fs--1 text-nowrap" href="{{route('event.index')}}">See all
                <svg class="svg-inline--fa fa-angle-right fa-w-8 ms-1" data-fa-transform="down-1" aria-hidden="true"
                     focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 256 512" data-fa-i2svg="" style="transform-origin: 0.25em 0.5625em;"><g transform="translate(128 256)">
                        <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"
                                                                                          transform="translate(-128 -256)"></path></g></g></svg></a>
        {!! $events->links() !!}
    </div>
</div>
</div>

@endsection
