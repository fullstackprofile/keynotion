@extends('layouts.admin')
@section('title', 'admin - All Categories')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" ></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <h3 class="p-3">Sponsorship Request Details</h3>
            <h5> Full Name: {{$sponsorship->name}}  {{$sponsorship->surname}}</h5>
            <p class="fs--1"></p>
            <h5>Company  Name: {{$sponsorship->company_name}}</h5>
            <p class="fs--1"></p>
            <h5>Job Title: {{$sponsorship->job_title}}</h5>
            <p class="fs--1"></p>
            <h5>Phone Number: {{$sponsorship->phone_number}}</h5>
            <p class="fs--1"></p>
            <h5>Corporate Email: {{$sponsorship->corporate_email}}</h5>
            <p class="fs--1"></p>
            <h5>Country: {{$sponsorship->country}}</h5>
            <p class="fs--1"></p>
            <h5>Summit Name: {{$sponsorship->summit_name}}</h5>
            <p class="fs--1" ></p>
            <h5>Presentation Proposal: </h5>
            <p class="fs--1" style="font-size: 17px !important;">{{$sponsorship->comments}}</p>
            <h5>Package Name: </h5>
            <p class="fs--1" style="font-size: 17px !important;">{{$sponsorship->package_name}}</p>
        </div>
    </div>
@endsection
