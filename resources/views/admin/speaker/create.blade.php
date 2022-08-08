@extends('layouts.admin')
@section('title', 'admin - create speaker')
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
            <h5 class="mb-0">Create Key Speaker</h5>
        </div>
        @if (session('success'))
            <div class="alert alert-danger" role="alert">
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
        @endif
        <div class="card-body bg-light">
            <form action="{{route('speaker.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="card cover-image mb-3 col-lg-12" style="width: 250px;height: 210px;position: relative">
                        <label>Speaker's Image</label>
                        <img id="file-ip-1-preview" class="card-img-top" src="../../assets/img/generic/13.jpg" alt="" style="width: 100% ; height: 100%;position:absolute;object-fit: cover">
                    </div>
                <input  name="avatar" type="file" id="upload-cover-image" accept="image/*" onchange="showPreview(event);" required="" style="margin-bottom: 10px">

                <div class="col-lg-12">
                    <label class="form-label" for="full-name">Full Name</label>
                    <input class="form-control" id="full_name" type="text"  name="full_name">
                </div>

                <div class="col-lg-12">
                    <label class="form-label" for="company">Company</label>
                    <input class="form-control" id="company" type="text" name="company">
                </div>

                <div class="col-lg-12">
                    <label class="form-label" for="profession">Heading</label>
                    <input class="form-control" id="profession" name="profession" type="text" >
                </div>
                <div class="col-lg-12">
                    <label class="form-label" for="profession">Linkedin Link</label><span>If speaker has</span>
                    <input class="form-control" id="profession" name="linkedin" type="text" >
                </div>
                <div class="col-lg-12 file_input">
                <label>Speaker's Company Logo</label>
                <input  name="company_logo" type="file" id="upload-cover-image1" accept="image/*"  required="">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-danger">Save Speaker</button>
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
    </script>
@endsection
