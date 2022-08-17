@extends('layouts.admin')
@section('title', 'admin - All Categories')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" ></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <h3 class="p-3">Brochure Request Details</h3>
            <h5>  Name: {{$question->name}} </h5>
            <p class="fs--1"></p>
            <h5>Phone Number: {{$question->phone}}</h5>
            <p class="fs--1"></p>
            <h5>Email: {{$question->email}}</h5>
            <p class="fs--1"></p>
            <h5>Company: {{$question->company}}</h5>
            <p class="fs--1"></p>
            <h5>Interested in: {{$question->interested}}</h5>
            <p class="fs--1"></p>
            <h5>Event: {{$question->event}}</h5>
            <p class="fs--1"></p>
            <h5>Message: </h5>
            <p class="fs--1" style="font-size: 17px !important;">{{$question->question}}</p>
        </div>
    </div>
@endsection
