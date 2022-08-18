@extends('layouts.admin')
@section('title', 'admin - All Categories')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" ></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <h3 class="p-3">Questions Details</h3>
            <h5>  Name: {{$eventQuestion->name}} </h5>
            <p class="fs--1"></p>
            <h5>Phone Number: {{$eventQuestion->tel}}</h5>
            <p class="fs--1"></p>
            <h5>Email: {{$eventQuestion->email}}</h5>
            <p class="fs--1"></p>
            <h5>Message: </h5>
            <p class="fs--1" style="font-size: 17px !important;">{{$eventQuestion->message}}</p>
        </div>
    </div>
@endsection
