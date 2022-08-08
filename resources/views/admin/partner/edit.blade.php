@extends('layouts.admin')
@section('title', 'admin - edit partner')
@section('content')
    <style>
        .logo{
            width: 300px !important;
            height: 200px !important;
            position:  relative !important;
        }
        .logo > .img{
            position: absolute !important;
            object-fit: cover !important;
            height: 100% !important;
        }
    </style>
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Update Partner</h5>
        </div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif

        <div class="card-body bg-light">
            <form action="{{route('partner.update',$partners['id'] )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card cover-image mb-3 logo" >
                    <img id="file-ip-1-preview" class="card-img-top img"  src="{{$partners->getFirstMediaUrl('partner_logo')}}"
                         alt="" >
                </div>
                <input name="logo" type="file" id="upload-cover-image" accept="image/*"
                       onchange="showPreview(event);" style="margin: 7px" value="{{$partners['logo']}}">
                <div class="row gx-2">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="event-name">Partner's Name</label>
                        <input class="form-control" name="name" id="event-name" type="text" placeholder="Who should attend" required  value="{{$partners['name']}}">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-danger">Update Partner</button>
                    </div>
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
