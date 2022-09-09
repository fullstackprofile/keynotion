@extends('layouts.admin')
@section('title', 'admin - All Categories')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" ></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <h3 class="p-3">Applied Speaker Details</h3>
            <h5> Full Name: {{$applied_speaker->name}}  {{$applied_speaker->surname}}</h5>
            <p class="fs--1"></p>
            <h5>Company  Name: {{$applied_speaker->company_name}}</h5>
            <p class="fs--1"></p>
            <h5>Job Title: {{$applied_speaker->job_title}}</h5>
            <p class="fs--1"></p>
            <h5>Phone Number: {{$applied_speaker->phone}}</h5>
            <p class="fs--1"></p>
            <h5>Corporate Email: {{$applied_speaker->corporate_email}}</h5>
            <p class="fs--1"></p>
            <h5>Country: {{$applied_speaker->country}}</h5>
            <p class="fs--1"></p>
            <h5>Summit Name: {{$applied_speaker->summit_name}}</h5>
            <p class="fs--1" ></p>
            <h5>Presentation Proposal: </h5>
            <p class="fs--1" style="font-size: 17px !important;">{{$applied_speaker->presentation_proposal}}</p>
            <h5>How did you learn about us? : </h5>
            <p class="fs--1" style="font-size: 17px !important">{{$applied_speaker->learn}}</p>
        </div>
    </div>
@endsection
