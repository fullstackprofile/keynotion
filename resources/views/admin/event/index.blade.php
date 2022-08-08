@extends('layouts.admin')
@section('title', 'admin - Events')
@section('content')
    <div class="col-12 mb-3">
        <div class="row justify-content-center justify-content-sm-between">
            <div class="col-sm-auto text-center">
                <h5 class="d-inline-block">Events</h5>
            </div>
            <div  class="col-sm-auto text-center">
                <div class="search-box" data-list="{&quot;valueNames&quot;:[&quot;title&quot;]}">
                    <form class="position-relative show" data-bs-toggle="search" data-bs-display="static" aria-expanded="true" action="{{route('search_events')}}" method="get">
                        <input class="form-control search-input fuzzy-search" type="search" name="search" placeholder="Search..." aria-label="Search">
                        <svg class="svg-inline--fa fa-search fa-w-16 search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                    </form>
                </div>
            </div>
        </div>
    </div>
        @if (session('success'))
            <div class="alert alert-danger" role="alert">
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
        @endif
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
                        <form action="{{route('event.destroy' , $event['id'])}}" method="post"
                              style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn p-0 ms-2 delete-btn" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                <span class="text-500 fas fa-trash-alt"></span>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
                    {!! $events->links() !!}
            </div>
        </div>
    </div>
@endsection
