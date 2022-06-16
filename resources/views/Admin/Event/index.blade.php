@extends('layouts.admin')
@section('title', 'Admin - Events')
@section('content')
    <div class="card mb-3 mb-lg-0">
        <div class="card-header bg-light d-flex justify-content-between">
            <h5 class="mb-0">Events</h5>
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
                            <p class="mb-1">Place - <a href="#!" class="text-700">{{$event['country']}}</a></p>
                            <p class="text-1000 mb-0">{{$event['start_date']}} - {{$event['end_date']}}</p>{{$event['city']}}, {{$event['address']}}<div class="border-dashed-bottom my-3"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
