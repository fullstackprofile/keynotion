@extends('layouts.admin')
@section('title', 'Admin - create event')
@section('content')


    <div class="row g-0">
        <div class="col-lg-12 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Event Details</h5>
                </div>
                @if (session('success'))
                    <div class="alert alert-danger" role="alert">
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
                <div class="card-body bg-light">
                    <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card cover-image mb-3">
                            <img id="file-ip-1-preview" class="card-img-top" src="../../assets/img/generic/13.jpg" alt="" height="400px">
                            <input  name="cover_img" type="file" id="upload-cover-image" accept="image/*" onchange="showPreview(event);" required style="margin: 7px">
                        </div>
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Event Title</label>
                                <input class="form-control" name="title" id="event-name" type="text" placeholder="Event Title" required>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="start-date">Start Date</label>
                                <input class="form-control datetimepicker flatpickr-input" name="start_date" id="start-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly" required>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="end-date">End Date</label>
                                <input class="form-control datetimepicker flatpickr-input" name="end_date" id="end-date" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly" required>
                            </div>
                            <div class="col-12">
                                <div class="border-dashed-bottom my-3"></div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="event-country">Country</label>
                                <input class="form-control" id="event-country" name="country" type="text" placeholder="Country" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="event-city">City</label>
                                <input class="form-control" id="event-city" type="text" name="city" placeholder="City" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="event-address">Address</label>
                                <input class="form-control" id="event-address" type="text" name="address" placeholder="Address" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="event-type">Event Category</label>
                                <select class="form-select" id="event-type" name="category_id" >
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="organizerMultiple">Event's Speakers</label>
                                <select class="form-select js-choice" name="speakers[]" id="organizerMultiple" multiple="multiple" size="1"  data-options='{"removeItemButton":true,"placeholder":true}'>
                                    @foreach($speakers as $speaker)
                                        <option value="">Select Event Speaker...</option>
                                        <option value="{{$speaker['id']}}">{{$speaker['full_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="event-description">Description</label>
                                <textarea class="form-control" id="event-description" name="small_description" rows="6"></textarea>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-danger">Save Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
    </script>

@endsection
