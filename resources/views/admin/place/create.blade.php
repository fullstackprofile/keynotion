@extends('layouts.admin')
@section('title', 'Admin - create venue')
@section('content')
    <style>
        .file_input{
            margin-top: 15px !important;
            margin-bottom: 15px !important;
            border: 1px solid var(--falcon-input-border-color) !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
            border-radius: 0.25rem !important;
            padding: 7px !important;
        }

    </style>
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Create The Venue</h5>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        <div class="card-body bg-light">
            <form action="{{route('place.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card cover-image mb-3 col-lg-12" style="width: 250px;height: 210px;position: relative">
                    <label>The Venue Image</label>
                    <img id="file-ip-1-preview" class="card-img-top" src="../../assets/img/generic/13.jpg" alt="" style="width: 100% ; height: 100%;position:absolute;object-fit: cover">
                </div>
                <input  name="cover[]" type="file" id="upload-cover-image" accept="image/*" onchange="showPreview(event);" required="" style="margin-bottom: 10px" multiple>

                <div class="col-lg-12">
                    <label class="form-label" for="full-name">Title</label>
                    <input class="form-control" id="full_name" type="text"  name="title">
                </div>

                <div class="col-lg-12 file_input">
                    <label>The Venue Logo</label>
                    <input  name="logo" type="file" id="upload-cover-image1" accept="image/*"  required="">
                </div>
                <div class="col-lg-12 mb-5">
                    <label class="form-label" for="full-name">Address </label>
                    <input class="form-control" id="full_name" type="text"  name="address">
                </div>
                <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="latitude" name="latitude" id="lat">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="longitude" name="longitude" id="lng">
                    </div>
                </div>
                <div id="map" style="height:400px; width: 100%;" class="my-3"></div>
                <div class="col-4">
                    <button type="submit" class="btn btn-danger">Save The Venue</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }

        }
        let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8,
                scrollwheel: true,
            });
            const uluru = { lat: -34.397, lng: 150.644 };
            let marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker,'position_changed',
                function (){
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#lat').val(lat)
                    $('#lng').val(lng)
                })
            google.maps.event.addListener(map,'click',
                function (event){
                    pos = event.latLng
                    marker.setPosition(pos)
                })
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
@endsection
