@extends('layouts.admin')
@section('title', 'Admin - create vacancy')
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
                    <h5 class="mb-0">Vacancy Details</h5>
                </div>

                <div class="card-body bg-light">
                    <form action="{{route('vacancy.store')}}" method="POST" >
                        @csrf
                        {{----------------------------Vacancy Title----------------------------------}}
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Vacancy Title <span style="color: red">*</span></label>
                                @error('title')
                                <div>error {{ $message }}</div> @enderror
                                <input class="form-control" name="title" type="text" placeholder="Vacancy Title"
                                       value="{{old('title')}}" required>
                            </div>
                            {{----------------------------Job Description----------------------------------}}
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-description">Job Description<span
                                        style="color: red">*</span></label>
                                <textarea class="form-control" id="event-description" name="job_description" rows="6"
                                          required>{{old('job_description')}}</textarea>
                            </div>
                            {{----------------------------About Role----------------------------------}}
                            <div class="col-12 mb-3 key_topic">
                                <label class="form-label" for="event-description">About The Role<span
                                        style="color: red">*</span></label>
                                @error('about_role')
                                <div>error {{ $message }}</div> @enderror
                                <div id="inputFormRow">
                                    <label class="form-label">About role items</label>
                                    <input type="text" name="about_role[0][item]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">
                                    <div class="input-group-append mb-3">
                                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                                <div id="newRow" class="mb-3"></div>
                                <button id="addRow" type="button" class="btn btn-info mb-3" data-next-counter="1">Add Item</button>
                            </div>
                            {{----------------------------What we are looking for----------------------------------}}
                            <div class="col-12 mb-3 key_topic">
                                <label class="form-label" for="event-description">What we are looking for<span
                                        style="color: red">*</span></label>
                                @error('looking_for')
                                <div>error {{ $message }}</div> @enderror
                                <div id="inputFormRow_looking">
                                    <label class="form-label">What we are looking for items</label>
                                    <input type="text" name="looking_for[0][item]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">
                                    <div class="input-group-append mb-3">
                                        <button id="removeRow_looking" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                                <div id="newRow_looking" class="mb-3"></div>
                                <button id="addRow_looking" type="button" class="btn btn-info mb-3" data-next-counter_looking="1">Add Item</button>
                            </div>
                        </div>
                        {{----------------------------Benefits----------------------------------}}
                        <div class="col-12 mb-3 key_topic">
                            <label class="form-label" for="event-description">Benefits<span
                                    style="color: red">*</span></label>
                            @error('benefits')
                            <div>error {{ $message }}</div> @enderror
                            <div id="inputFormRow_benefits">
                                <label class="form-label">Benefits items</label>
                                <input type="text" name="benefits[0][item]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">
                                <div class="input-group-append mb-3">
                                    <button id="removeRow_benefits" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                            <div id="newRow_benefits" class="mb-3"></div>
                            <button id="addRow_benefits" type="button" class="btn btn-info mb-3" data-next-counter_benefits="1">Add Item</button>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-danger">Save Vacancy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>

        {{----------------------------Key Topics----------------------------------}}

        $("#addRow").click(function () {
            var html = '';
            var counter = parseInt($(this).data('next-counter'));
            console.log(counter)
            html += '<div id="inputFormRow">';
            html += '<label class="form-label">About role items</label>';
            html += '<input type="text" name="about_role[' + counter + '][item]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">';
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

        {{----------------------------What we are looking for----------------------------------}}

        $("#addRow_looking").click(function () {
            var html = '';
            var counter = parseInt($(this).data('next-counter_looking'));
            console.log(counter)
            html += '<div id="inputFormRow_looking">';
            html += '<label class="form-label">What we are looking for items</label>';
            html += '<input type="text" name="looking_for[' + counter + '][item]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">';
            html += '<div class="input-group-append mb-3">';
            html += '<button id="removeRow_looking" type="button" class="btn btn-danger mb-3">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow_looking').append(html);
            $(this).data('next-counter_looking', counter + 1)
        });

        // remove row
        $(document).on('click', '#removeRow_looking', function () {
            $(this).closest('#inputFormRow_looking').remove();
        });

        {{----------------------------Benefits----------------------------------}}

        $("#addRow_benefits").click(function () {
            var html = '';
            var counter = parseInt($(this).data('next-counter_benefits'));
            console.log(counter)
            html += '<div id="inputFormRow_benefits">';
            html += '<label class="form-label">What we are looking for items</label>';
            html += '<input type="text" name="benefits[' + counter + '][item]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">';
            html += '<div class="input-group-append mb-3">';
            html += '<button id="removeRow_benefits" type="button" class="btn btn-danger mb-3">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow_benefits').append(html);
            $(this).data('next-counter_benefits', counter + 1)
        });

        // remove row
        $(document).on('click', '#removeRow_benefits', function () {
            $(this).closest('#inputFormRow_benefits').remove();
        });
    </script>


@endsection
