@extends('layouts.admin')
@section('title', 'admin - create event')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>--}}
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

                <div class="card-body bg-light">
                    <form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{----------------------------cover image----------------------------------}}
                        <div class="card cover-image mb-3">
                            <img id="file-ip-1-preview" class="card-img-top" src="../../assets/img/generic/13.jpg"
                                 alt="" height="400px">
                            <input name="cover_img" type="file" id="upload-cover-image" accept="image/*"
                                   onchange="showPreview(event);" style="margin: 7px">
                        </div>
                        {{----------------------------event Title----------------------------------}}
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Event Title <span style="color: red">*</span></label>
                                @error('title')
                                <div>error {{ $message }}</div> @enderror
                                <input class="form-control" name="title" type="text" placeholder="Event Title"
                                       value="{{old('title')}}" required>
                            </div>
                            {{----------------------------Start Date----------------------------------}}
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="start-date"> Date <span style="color: red">*</span></label>
                                <input type="date" name="start_date"
                                       placeholder="d/m/y"
                                       required >
                            </div>
                            {{----------------------------End Date----------------------------------}}
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="start-date"> Date <span style="color: red">*</span></label>
                                <input type="date" name="end_date"
                                       placeholder="d/m/y"
                                       required >
                            </div>
                            <div class="col-12">
                                <div class="border-dashed-bottom my-3"></div>
                            </div>
                            {{----------------------------country city Adress----------------------------------}}
                            <div class="col-sm-3 mb-3">
                                <label class="form-label" for="event-country">Country<span
                                        style="color: red">*</span></label>
                                <select class="form-select js-choice" name="country_id" id="country">
                                    <option selected disabled>Select country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{$country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label" for="event-city">State<span
                                        style="color: red">*</span></label>
                                <select class="form-select" name="state_id" id="state" style="padding: 9px !important;"></select>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label" for="event-city">City<span style="color: red">*</span></label>
                                <select class="form-select" name="city_id" id="city" style="padding: 9px !important;"></select>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label" for="event-address">Address<span
                                        style="color: red">*</span></label>
                                <input class="form-control" id="event-address" type="text" name="address"
                                       style="padding: 9px !important;" placeholder="Address" required value="{{old('address')}}">
                            </div>
                            {{----------------------------category----------------------------------}}
                            <div class="mb-3">
                                <label class="form-label" for="event-type">Event Category<span
                                        style="color: red">*</span></label>
                                <select class="form-select" id="event-type" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{----------------------------Speakers----------------------------------}}
                            <div class="mb-3">
                                <label for="organizerMultiple">Event's Speakers<span style="color: red">*</span></label>
                                <select class="form-select js-choice" name="speakers[]" id="organizerMultiple"
                                        multiple="multiple" size="1"
                                        data-options='{"removeItemButton":true,"placeholder":true}' required>
                                    @foreach($speakers as $speaker)
                                        <option value="">Select Event Speaker...</option>
                                        <option value="{{$speaker['id']}}">{{$speaker['full_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{----------------------------Attenders----------------------------------}}
                            <div class="mb-3">
                                <label for="organizerMultiple">Who Should Attend<span
                                        style="color: red">*</span></label>
                                <select class="form-select js-choice" id="organizerMultiple" multiple="multiple"
                                        size="1"
                                        name="attenders[]" required="required"
                                        data-options='{"removeItemButton":true,"placeholder":true}'>
                                    @foreach($attenders as $attender)
                                        <option value="">Select Event Attenders...</option>
                                        <option value="{{$attender['id']}}">{{$attender['title']}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select one or multiple</div>
                            </div>
                            {{----------------------------Small Description----------------------------------}}
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-description">Small Description<span
                                        style="color: red">*</span></label>
                                <textarea class="form-control" id="event-description" name="small_description" rows="6"
                                          required>{{old('small_description')}}"</textarea>
                            </div>
                            {{----------------------------About Information----------------------------------}}
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-description">About Information<span
                                        style="color: red">*</span></label>
                                <br>
                                <input name="about_img" type="file" id="upload-cover-image" accept="image/*"
                                       style="margin: 7px">
                                <textarea class="form-control" id="event-description" name="about_info" rows="6"
                                          required>{{old('about_info')}}</textarea>
                            </div>
                            {{----------------------------key topics----------------------------------}}
                            <div class="col-12 mb-3 key_topic">
                                <label class="form-label" for="event-description">Key Topics<span
                                        style="color: red">*</span></label>
                                @error('key_topics')
                                <div>error {{ $message }}</div> @enderror
                                <input name="key_topic_img" type="file" id="upload-cover-image" accept="image/*"
                                       style="margin: 7px">
                                <div id="inputFormRow">
                                    <label class="form-label">Title of topic</label>
                                    <input type="text" name="key_topics[0][title]" class="form-control m-input mb-3"
                                           placeholder="Enter title" autocomplete="off">
                                    <label class="form-label">Description of topic</label>
                                    <textarea class="form-control  mb-3" name="key_topics[0][description]"
                                              rows="6" required id="textarea" ></textarea>
                                    <div class="input-group-append mb-3">
                                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                                <div id="newRow" class="mb-3"></div>
                                <button id="addRow" type="button" class="btn btn-info mb-3" data-next-counter="1" >Add
                                    Key
                                    Topic
                                </button>
                            </div>

                            {{----------------------------key takeaway----------------------------------}}
                            <div class="col-12 mb-3 key_topic">
                                <label class="form-label" for="event-description">Key Takeaway<span
                                        style="color: red">*</span></label>
                                @error('key_takeaway')
                                <div>error {{ $message }}</div> @enderror
                                <div id="inputFormRow-key">
                                    <label class="form-label">Key Takeaway item</label>
                                    <textarea class="form-control  mb-3" name="key_takeaway[0][item]"
                                              rows="6" required></textarea>
                                    <div class="input-group-append mb-3">
                                        <button id="removeRow-key" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                                <div id="newRow-key" class="mb-3"></div>
                                <button id="addRow-key" type="button" class="btn btn-info mb-3"
                                        data-next-counter-key="1">Add Takeaway
                                </button>
                            </div>
                            {{----------------------------vip tour----------------------------------}}
                            <div class="col-12 mb-3 key_topic">
                                <label class="form-label" for="event-description">Vip Tour<span
                                        style="color: red">*</span></label>
                                @error('vip_tour')
                                <div>error {{ $message }}</div> @enderror
                                <input name="vip_tour_img" type="file" id="upload-cover-image" accept="image/*"
                                       style="margin: 7px">
                                <div id="inputFormRow-vip">
                                    <label class="form-label" for="start-date">Start Date and Time</label>
                                    <input class="form-control  active mb-3" name="vip_tour[0][date]"
                                           type="time" placeholder="time">
                                    <label class="form-label">Description </label>
                                    <input type="text" class="form-control m-input mb-3"
                                           name="vip_tour[0][description]">
                                    <div class="input-group-append mb-3">
                                        <button id="removeRow-vip" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
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
                                    <option value="">Select Event Sponsor...</option>
                                    <option value="{{$sponsor['id']}}">{{$sponsor['name']}}</option>
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
                                    <option value="">Select Event Partner...</option>
                                    <option value="{{$partner['id']}}">{{$partner['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{----------------------------The Venue----------------------------------}}
                        <div class="mb-5">
                            <label class="form-label" for="event-type">Event Venue<span
                                    style="color: red">*</span></label>
                            <select class="form-select" id="event-type" name="places" required>
                                @foreach($places as $place)
                                    <option value="{{$place['id']}}">{{$place['title']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-danger" >Save Event</button>
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


        {{----------------------------Key Topics----------------------------------}}

        $("#addRow").click(function () {
            var html = '';
            var counter = parseInt($(this).data('next-counter'));
            console.log(counter)
            html += '<div id="inputFormRow">';
            html += '<label class="form-label">Title of topic</label>';
            html += '<input type="text" name="key_topics[' + counter + '][title]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">';
            html += '<label class="form-label">Description of topic</label>';
            html += '<textarea class="form-control  mb-3"  name="key_topics[' + counter + '][description]" rows="6" id="textarea" required></textarea>';
            html += '<div class="input-group-append mb-3">';
            html += '<button id="removeRow" type="button" class="btn btn-danger mb-3">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
            $(this).data('next-counter', counter + 1)
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });


        {{----------------------------key takeaway----------------------------------}}

        $("#addRow-key").click(function () {
            var html = '';
            var counter_key = parseInt($(this).data('next-counter-key'));
            console.log(counter_key)
            html += '<div id="inputFormRow-key">';
            html += '<label class="form-label">Key Takeaway item</label>';
            html += '<textarea class="form-control  mb-3" name="key_takeaway[' + counter_key + '][item]" rows="6" required></textarea>';
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
            html += '<input class="form-control  active mb-3" name="vip_tour[' + counter_vip + '][date]" type="time" placeholder="d/m/y" >';
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

        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

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
