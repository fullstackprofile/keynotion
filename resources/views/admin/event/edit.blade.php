@extends('layouts.admin')
@section('title', 'admin - update event')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .key_topic {
            border: 1px solid #b9bec5;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
        }
    </style>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif
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
                    <form action="{{route('event.update',$event['id'] )}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card cover-image mb-3">
                            <img id="file-ip-1-preview" class="card-img-top" src="{{$event->getFirstMediaUrl('event_img')}}" alt=""
                                 height="400px">
                            <input name="cover_img" type="file" id="upload-cover-image" accept="image/*"
                                   onchange="showPreview(event);"  style="margin: 7px">
                        </div>
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Event Title</label>
                                <input class="form-control" name="title" id="event-name" value="{{$event['title']}}"
                                       type="text" placeholder="Event Title" >
                            </div>
                            {{----------------------------Start Date----------------------------------}}
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="start-date"> start Date <span style="color: red">*</span></label>
                                <input type="date" name="start_date"
                                       placeholder="{{$event['start_date']}}" value="{{$event['start_date']}}">
                            </div>
                            {{----------------------------End Date----------------------------------}}
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="start-date">end  Date <span style="color: red">*</span></label>
                                <input type="date" name="end_date"
                                       placeholder="{{$event['end_date']}}" value="{{$event['end_date']}}">
                            </div>
                            <div class="col-12">
                                <div class="border-dashed-bottom my-3"></div>
                            </div>
                            {{----------------------------country city Address----------------------------------}}
                            <div class="col-sm-3 mb-3">
                                <label class="form-label" for="event-country">Country<span
                                        style="color: red">*</span></label>
                                <select class="form-select" name="country_id" id="country">
                                    <option selected disabled>Select country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" @if($country->id == $event->country_id)  selected @endif >{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label" for="event-city">State<span
                                        style="color: red">*</span></label>
                                <select class="form-select" name="state_id" id="state" >
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}" @if($state->id == $event->state_id)  selected @endif >{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label" for="event-city">City<span style="color: red">*</span></label>
                                <select class="form-select" name="city_id" id="city" >
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @if($city->id == $event->city_id)  selected @endif >{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label" for="event-address">Address<span
                                        style="color: red">*</span></label>
                                <input class="form-control" id="event-address" type="text" name="address"
                                       placeholder="Address" required value="{{$event['address']}}">
                            </div>
                            {{----------------------------category----------------------------------}}
                            <div class="mb-3">
                                <label class="form-label" for="event-type">Event Category</label>
                                <select class="form-select" id="event-type" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}"
                                                @if($category['id'] == $event['category_id'])  selected
                                            @endif >{{$category['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{----------------------------Speakers----------------------------------}}
                            <div class="mb-3">
                                <label for="organizerMultiple">Event's Speakers</label>
                                <select class="form-select js-choice" name="speakers[]" id="organizerMultiple"
                                        multiple="multiple" size="1"
                                        data-options='{"removeItemButton":true,"placeholder":true}'>
                                    @foreach($speakers as $key)
                                        <option
                                            value="{{$key['id']}}"
                                            @if(in_array($key['id'],$speakers_selected))
                                                selected
                                            @endif
                                        > {{$key['full_name'] }}  </option>
                                    @endforeach
                                </select>
                            </div>
                            {{----------------------------Attenders----------------------------------}}
                            <div class="mb-3">
                                <label for="organizerMultiple">Who Should Attend<span style="color: red">*</span></label>
                                <select class="form-select js-choice" id="organizerMultiple" multiple="multiple" size="1"
                                        name="attenders[]"  data-options='{"removeItemButton":true,"placeholder":true}'>
                                        @foreach($attenders as $attender)
                                            <option
                                                value="{{$attender['id']}}"
                                                @if(in_array($attender['id'],$attenders_selected))
                                                    selected
                                                @endif
                                            > {{$attender['title'] }}  </option>
                                        @endforeach
                                </select>
                                <div class="invalid-feedback">Please select one or multiple</div>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="event-description">Small Description</label>
                                <textarea class="form-control" id="event-description" name="small_description"
                                          rows="6">{{$event['small_description']}}</textarea>
                            </div>
                            {{----------------------------About Information----------------------------------}}
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-description">About Information<span style="color: red">*</span></label>
                                <br>
                                <img id="file-ip-1-preview" class="card-img-top" src="{{$event->getFirstMediaUrl('event_about_img')}}" alt=""
                                     style="width: 10%">
                                <input name="about_img" type="file" id="upload-cover-image" accept="image/*" style="margin: 7px">
                                <textarea class="form-control" id="event-description" name="about_info" rows="6"
                                         >{{$event['about_info']}}</textarea>
                            </div>

                            {{----------------------------key topics----------------------------------}}
                            <div class="col-12 mb-3 key_topic">
                                <label class="form-label" for="event-description">Key Topics<span style="color: red">*</span></label>
                                @error('key_topics') <div>error {{ $message }}</div> @enderror
                                <img id="file-ip-1-preview" class="card-img-top" src="{{$event->getFirstMediaUrl('event_key_topics_img')}}" alt=""
                                     style="width: 10%">
                                <input name="key_topic_img" type="file" id="upload-cover-image" accept="image/*" style="margin: 7px">
                                @foreach($event['key_topics'] as $key_number => $key )
                                <div id="inputFormRow">
                                    <label class="form-label">Title of topic</label>
                                    <input type="text" name="key_topics[{{$key_number}}][title]" class="form-control m-input mb-3"
                                           placeholder="Enter title" autocomplete="off" value="{{$key['title']}}">
                                    <label class="form-label">Description of topic</label>
                                    <textarea class="form-control  mb-3" name="key_topics[{{$key_number}}][description]"
                                              rows="6"  id="textarea">{{$key['description']}}</textarea>
                                    <div class="input-group-append mb-3">
                                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                                @endforeach
                                <div id="newRow" class="mb-3"></div>
                                <button id="addRow" type="button" class="btn btn-info mb-3" data-next-counter="{{count($event['key_topics']) + 1}}">Add Key
                                    Topic
                                </button>
                            </div>
                            {{----------------------------key takeaway----------------------------------}}
                            <div class="col-12 mb-3 key_topic">
                                <label class="form-label" for="event-description">Key Takeaway<span style="color: red">*</span></label>
                                @error('key_takeaway') <div>error {{ $message }}</div> @enderror
                                @foreach($event['key_takeaway'] as $key_takeaway => $key)
                                    <div id="inputFormRow-key">
                                        <label class="form-label">Key Takeaway item</label>
                                        <textarea class="form-control  mb-3" name="key_takeaway[{{$key_takeaway}}][item]"
                                                  rows="6" required>{{$key['item']}}</textarea>
                                        <div class="input-group-append mb-3">
                                            <button id="removeRow-key" type="button" class="btn btn-danger">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                                <div id="newRow-key" class="mb-3"></div>
                                <button id="addRow-key" type="button" class="btn btn-info mb-3" data-next-counter="{{count($event['key_takeaway']) + 1}}">Add Takeaway
                                </button>
                            </div>
                            {{----------------------------vip tour----------------------------------}}
                            <div class="col-12 mb-3 key_topic">
                                <label class="form-label" for="event-description">Vip Tour<span style="color: red">*</span></label>
                                @error('vip_tour')<div>error {{ $message }}</div> @enderror
                                <img id="file-ip-1-preview" class="card-img-top" src="{{$event->getFirstMediaUrl('event_vip_tour_img')}}" alt=""
                                     style="width: 10%">
                                <input name="vip_tour_img" type="file" id="upload-cover-image" accept="image/*" style="margin: 7px">
                                @foreach($event['vip_tour'] as $vip_tour => $key)
                                <div id="inputFormRow-vip">
                                    <label class="form-label" for="start-date">Start Date and Time</label>
                                    <input class="form-control  active mb-3" name="vip_tour[{{$vip_tour}}][date]"
                                           type="time" placeholder="time" value="{{$key['date']}}">
                                    <label class="form-label">Description </label>
                                    <input type="text" class="form-control m-input mb-3"
                                           name="vip_tour[{{$vip_tour}}][description]" value="{{$key['description']}}">
                                    <div class="input-group-append mb-3">
                                        <button id="removeRow-vip" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                                @endforeach
                                <div id="newRow-vip" class="mb-3"></div>
                                <button id="addRow-vip" type="button" class="btn btn-info mb-3"
                                        data-next-counter-vip="1">Add Event's Venue Setting
                                </button>
                            </div>
                        </div>
                            {{----------------------------Sponsors----------------------------------}}
                            <div class="mb-3">
                                <label for="organizerMultiple">Event's Sponsors<span style="color: red">*</span></label>
                                <select class="form-select js-choice" name="sponsors[]" id="organizerMultiple"
                                        multiple="multiple" size="1"
                                        data-options='{"removeItemButton":true,"placeholder":true}' required>
                                    @foreach($sponsors as $sponsor)
                                        <option
                                            value="{{$sponsor['id']}}"
                                            @if(in_array($sponsor['id'],$sponsors_selected))
                                                selected
                                            @endif
                                        > {{$sponsor['name'] }}  </option>
                                    @endforeach
                                </select>
                            </div>
                            {{----------------------------Partners----------------------------------}}
                            <div class="mb-3">
                                <label for="organizerMultiple">Event's Partners<span style="color: red">*</span></label>
                                <select class="form-select js-choice" name="partners[]" id="organizerMultiple"
                                        multiple="multiple" size="1"
                                        data-options='{"removeItemButton":true,"placeholder":true}' required>
                                        @foreach($partners as $partner)
                                            <option
                                                value="{{$partner['id']}}"
                                                @if(in_array($partner['id'],$partners_selected))
                                                    selected
                                                @endif
                                            > {{$partner['name'] }}  </option>
                                        @endforeach
                                </select>
                            </div>
                            {{----------------------------The Venue----------------------------------}}
                            <div class="mb-3">
                                <label class="form-label" for="event-type">Event Venue<span style="color: red">*</span></label>
                                <select class="form-select" id="event-type" name="places" required>
                                    @foreach($places as $place)
                                        <option value="{{$place['id']}}">{{$place['title']}}</option>
                                    @endforeach
                                        @foreach($places as $place)
                                            <option
                                                value="{{$place['id']}}"
                                                @if(in_array($place['id'],$places_selected))
                                                    selected
                                                @endif
                                            > {{$place['title'] }}  </option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-danger">Update Event</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    {{----------------------------country state CIty----------------------------------}}
    <script>

        $(document).ready(function () {
            $('#country').on('change', function () {
                var countryId = this.value;
                $('#state').html('');
                $.ajax({
                    url: '{{ route('getStates') }}?country_id=' + countryId,
                    method: 'GET',
                }).done(function (res) {
                    $('#state').html('<option value="">Select state</option>');
                    $.each(res, function (key, value) {
                        $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('#city').html('<option value="">Select city</option>');

                });
            });

            $('#state').on('change', function () {
                var stateId = this.value;
                console.log('state changed', stateId)
                $('#city').html('');

                $.ajax({
                    url: '{{ route('getCities') }}?state_id=' + stateId,
                    method: 'GET',
                }).done(function (res) {
                    $('#city').html('<option value="">Select city</option>');
                    $.each(res, function (key, value) {
                        $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                });
            });
        });
    </script>

    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        $("#addRow").click(function () {
            var html = '';
            var counter = parseInt($(this).data('next-counter'));
            console.log(counter)
            html += '<div id="inputFormRow">';
            html += '<label class="form-label">Title of topic</label>';
            html += '<input type="text" name="key_topics[' + counter + '][title]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">';
            html += '<label class="form-label">Description of topic</label>';
            html += '<textarea class="form-control  mb-3"  name="key_topics[' + counter + '][description]" rows="6" id="textarea"  required></textarea>';
            html += '<div class="input-group-append mb-3">';
            html += '<button id="removeRow" type="button" class="btn btn-danger mb-3">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
            $(this).data('next-counter', counter + 1)
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow',).remove();
        });

        {{----------------------------key takeaway----------------------------------}}

        $("#addRow-key").click(function () {
            var html = '';
            var counter_key = parseInt($(this).data('next-counter-key'));
            console.log(counter_key)
            html += '<div id="inputFormRow-key">';
            html += '<label class="form-label">Key Takeaway item</label>';
            html += '<textarea class="form-control mb-3" name="key_takeaway[' + counter_key + '][item]" rows="6" required></textarea>';
            html += '<div class="input-group-append mb-3">';
            html += '<button id="removeRow-key" type="button" class="btn btn-danger mb-3">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow-key').append(html);
            $(this).data('next-counter-key', counter_key + 1)
        });

        // remove row
        $(document).on('click', '#removeRow-key', function () {
            $(this).closest('#inputFormRow-key').remove();
        });

        {{----------------------------vip tour----------------------------------}}
        $("#addRow-vip").click(function () {
            var html = '';
            var counter_vip = parseInt($(this).data('next-counter-vip'));
            console.log(counter_vip)
            html += '<div id="inputFormRow-vip">';
            html += '<label class="form-label" for="start-date">Start Date and Time</label>';
            html += '<input class="form-control  active mb-3" name="vip_tour[' + counter_vip + '][date]" type="time" placeholder="time  " >';
            html += '<label class="form-label">Description </label>';
            html += '<input type="text" class="form-control m-input mb-3" name="vip_tour[' + counter_vip + '][description]">';
            html += '<div class="input-group-append mb-3">';
            html += '<button id="removeRow-vip" type="button" class="btn btn-danger mb-3">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow-vip').append(html);
            $(this).data('next-counter-vip', counter_vip + 1)
        });

        // remove row
        $(document).on('click', '#removeRow-vip', function () {
            $(this).closest('#inputFormRow-vip').remove();
        });
        $('#textarea').keypress(function(e) {
            var display = $('#textarea').val();

            if (e.shiftKey === true) {
                if (e.which == 13) {
                    //append a break
                    $('#textarea').append("<br/>");

                }

            } else {
                if (e.which == 13) {
                    // submit to form using submit()
                    $('span#display').html(display);

                }
            }

        });

    </script>

@endsection
