@extends('layouts.admin')
@section('title', 'admin - All Categories')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" ></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <h3 class="p-3">Brochure Request Details</h3>
            <h5> Full Name: {{$brochure->name}}  {{$brochure->surname}}</h5>
            <p class="fs--1"></p>
            <h5>Company  Name: {{$brochure->company_name}}</h5>
            <p class="fs--1"></p>
            <h5>Job Title: {{$brochure->job_title}}</h5>
            <p class="fs--1"></p>
            <h5>Phone Number: {{$brochure->phone}}</h5>
            <p class="fs--1"></p>
            <h5>Corporate Email: {{$brochure->corporate_email}}</h5>
            <p class="fs--1"></p>
            <h5>Country: {{$brochure->country}}</h5>
            <p class="fs--1"></p>
            <h5>Summit Name: {{$brochure->summit_name}}</h5>
            <p class="fs--1" ></p>
            <h5>Presentation Proposal: </h5>
            <p class="fs--1" style="font-size: 17px !important;">{{$brochure->comment}}</p>
            <h5>How did you learn about us? : </h5>
            <p class="fs--1" style="font-size: 17px !important">{{$brochure->learn}}</p>
        </div>
    </div>
@endsection
