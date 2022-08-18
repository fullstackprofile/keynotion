@extends('layouts.admin')
@section('title', 'admin - edit speaker')
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
            <h5 class="mb-0">Update Key Speaker</h5>
        </div>
        @if (session('success'))
            <div class="alert alert-danger" role="alert">
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>

        @endif
        <div class="card-body bg-light">
            <form action="{{route('speaker.update',$speakers['id'] )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card cover-image mb-3 col-lg-12" style="width: 250px;height: 210px;position: relative">
                    <label>Speaker's Image</label>
                    <img id="file-ip-1-preview" class="card-img-top" src="{{$speakers->getFirstMediaUrl('speaker_avatar')}}" alt="" style="width: 100% ; height: 100%;position:absolute;object-fit: cover">
                </div>

                <input  name="avatar" type="file" id="upload-cover-image" value="" accept="image/*" onchange="showPreview(event);" >

                <div class="col-lg-12">
                    <label class="form-label" for="full-name">Full Name</label>
                    <input class="form-control" id="full_name" type="text" value="{{$speakers['full_name']}}" name="full_name">
                </div>

                <div class="col-lg-12">
                    <label class="form-label" for="company">Company</label>
                    <input class="form-control" id="company" type="text" value="{{$speakers['company']}}" name="company">
                </div>

                <div class="col-lg-12 mb-3">
                    <label class="form-label" for="profession">Position</label>
                    <input class="form-control" id="profession" name="profession" value="{{$speakers['profession']}}" type="text" >
                </div>
                <div class="col-lg-12">
                    <label class="form-label" for="profession">Linkedin Link</label><span>If speaker has</span>
                    <input class="form-control" id="profession" name="linkedin" type="text" value="{{$speakers['linkedin']}}">
                </div>
                <label class="mb-3">Speaker's Company Logo</label>
                <div class="card cover-image mb-3 col-lg-12" style="width: 250px;height: 100px;position: relative">
                    <img id="file-ip-1-preview" class="card-img-top" src="{{$speakers->getFirstMediaUrl('company_logo')}}" alt="" style="width: 100% ; height: 100%;position:absolute;">
                </div>

                <input class="mb-3" name="company_logo" type="file" id="upload-cover-image" value="" accept="image/*" >

                <div class="col-4">
                    <button type="submit" class="btn btn-danger">Update Speaker</button>
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
