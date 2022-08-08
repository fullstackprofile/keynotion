@extends('layouts.admin')
@section('title', 'admin - create testimonial')
@section('content')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <link rel="stylesheet" href="jquery.rateyo.css"/>
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
            <h5 class="mb-0">Create Testimonial</h5>
        </div>
        @if (session('success'))
            <div class="alert alert-danger" role="alert">
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        <div class="card-body bg-light">
            <form action="{{route('testimonial.update',$testimonials['id'])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-lg-12" >
                    <label>Rating</label>
                    <div class="rateyo" id= "rating"
                         data-rateyo-rating="{{$testimonials['star']}}"
                         data-rateyo-num-stars="5"
                         data-rateyo-score="3">
                    </div>
                    <input type="hidden" name="star" value="{{$testimonials['star']}}">
                </div>
                <div class="col-lg-12">
                    <label class="form-label" for="profession">Comment</label>
                    <textarea class="form-control"  name="testimonial" rows="6"
                              required>{{$testimonials['testimonial']}}</textarea>
                </div>

                <div class="col-lg-12">
                    <label class="form-label" for="full-name">Full Name</label>
                    <input class="form-control" id="full_name" type="text" value="{{$testimonials['full_name']}}" name="full_name">
                </div>
                <div class="col-lg-12">
                    <label class="form-label" for="profession">Position</label>
                    <input class="form-control" id="profession" value="{{$testimonials['heading']}}" name="heading" type="text" >
                </div>
                <div class="col-lg-12">
                    <label class="form-label" for="profession">Profession</label>
                    <input class="form-control" id="profession"  value="{{$testimonials['profession']}}" name="profession" type="text" >
                </div>

                <div class="col-lg-12">
                    <label class="form-label" for="company">Company</label>
                    <input class="form-control" id="company"  value="{{$testimonials['company']}}" type="text" name="company">
                </div>
                <div class="card cover-image mb-3 col-lg-12" style="width: 100px;height: 100px;position: relative">
                    <label> Logo</label>
                    <img id="file-ip-1-preview" class="card-img-top" src="{{$testimonials->getFirstMediaUrl('testimonial_logo')}}" alt="" style="width: 100% ; height: 100%;position:absolute;object-fit: cover">
                </div>
                <input  name="logo" type="file" id="upload-cover-image" accept="image/*" onchange="showPreview(event);"  style="margin-bottom: 10px">
                <div class="col-4">
                    <button type="submit" class="btn btn-danger">Update Testimonial</button>
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
        $(function () {
            $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :'+ rating);
                $(this).parent().find('input[name=star]').val(rating); //add rating value to input field
            });
        });
    </script>
    <script src="jquery.js"></script>
    <script src="jquery.rateyo.js"></script>
@endsection
