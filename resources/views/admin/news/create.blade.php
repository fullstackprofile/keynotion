@extends('layouts.admin')
@section('title', 'admin - create news')
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
                    <h5 class="mb-0">News Details</h5>
                </div>

                <div class="card-body bg-light">
                    <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{----------------------------Cover----------------------------------}}
                        <div class="card cover-image mb-3">
                            <img id="file-ip-1-preview" class="card-img-top" src="../../assets/img/generic/13.jpg"
                                 alt="" height="400px">
                            <input name="news_img" type="file" id="upload-cover-image" accept="image/*"
                                   onchange="showPreview(event);" style="margin: 7px" required>
                        </div>
                        {{----------------------------Start Date----------------------------------}}
                        <div class="col-sm-6 mb-3">
                            <label class="form-label" for="start-date"> Date <span style="color: red">*</span></label>
                            <input type="date" name="date"
                                    placeholder="d/m/y"
                                 required value="{{old('date')}}">
                        </div>
                        {{---------------------------- Title----------------------------------}}
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">News Title <span style="color: red">*</span></label>
                                @error('title')
                                <div>error {{ $message }}</div> @enderror
                                <input class="form-control" name="title" type="text" placeholder="Vacancy Title"
                                       value="{{old('title')}}" required>
                            </div>
                            {{----------------------------Description----------------------------------}}
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-description"> Description<span
                                        style="color: red">*</span></label>
                                <textarea class="form-control" id="event-description" name="description" rows="6"
                                          required>{{old('description')}}</textarea>
                            </div>
                            {{----------------------------category----------------------------------}}
                            <div class="mb-3">
                                <label class="form-label" for="event-type">News Category<span
                                        style="color: red">*</span></label>
                                <select class="form-select" id="event-type" name="news_category_id" required>
                                    @foreach($news_categories as $news_category)
                                        <option value="{{$news_category['id']}}">{{$news_category['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{----------------------------question----------------------------------}}
                            <div class="col-12 mb-3 key_topic">
                                <label class="form-label" for="event-description">News questions and answers<span
                                        style="color: red">*</span></label>
                                @error('item')
                                <div>error {{ $message }}</div> @enderror
                                <div id="inputFormRow">
                                    <label class="form-label">Question</label>
                                    <input type="text" name="item[0][action]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">
                                    <label class="form-label">Answer</label>
                                    <textarea class="form-control  mb-3" name="item[0][answer]"
                                              rows="6" required></textarea>
                                    <div class="input-group-append mb-3">
                                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                                <div id="newRow" class="mb-3"></div>
                                <button id="addRow" type="button" class="btn btn-info mb-3" data-next-counter="1">Add Item</button>
                            </div>
                        </div>
                        <div class="col-4">

                            <button type="submit" class="btn btn-danger">Save News></button>
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
            html += '<label class="form-label">question</label>';
            html += ' <input type="text" name="item[' + counter + '][action]" class="form-control m-input mb-3" placeholder="Enter title" autocomplete="off">';
            html += '<label class="form-label">Answer</label>';
            html += '<textarea class="form-control  mb-3" name="item[' + counter + '][answer]" rows="6" required></textarea>';
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


        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

    </script>


@endsection
