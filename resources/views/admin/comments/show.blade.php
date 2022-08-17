@extends('layouts.admin')
@section('title', 'admin - All Categories')
@section('content')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" ></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <h3 class="p-3">Applied Speaker Details</h3>
            <h5> Full Name: {{$comment->name}} </h5>
            <p class="fs--1"></p>
            <h5> Email: {{$comment->email}}</h5>
            <p class="fs--1"></p>
            <h5>Website: {{$comment->website}}</h5>
            <p class="fs--1"></p>
            <h5>Comment </h5>
            <p class="fs--1" style="font-size: 17px !important;">{{$comment->comment}}</p>
        </div>
    </div>
@endsection
