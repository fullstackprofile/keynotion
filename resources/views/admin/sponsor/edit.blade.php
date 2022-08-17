@extends('layouts.admin')
@section('title', 'admin - edit sponsor')
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Update Sponsor</h5>
        </div>
        @if (session('success'))
            <div class="alert alert-danger" role="alert">
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>

        @endif
        <div class="card-body bg-light">
            <form action="{{route('sponsor.update',$sponsors['id'] )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card cover-image mb-3 logo" >
                    <img id="file-ip-1-preview" class="card-img-top img"  src="{{$sponsors->getFirstMediaUrl('sponsor_logo')}}"
                         alt="" style="width: 10%">
                </div>
                <input name="logo" type="file" id="upload-cover-image" accept="image/*"
                       onchange="showPreview(event);" style="margin: 7px" value="{{$sponsors['logo']}}">
                <div class="row gx-2">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="event-name">Sponsor Link</label>
                        <input class="form-control" name="name" id="event-name" type="text" placeholder="Who should attend" required  value="{{$sponsors['name']}}">
                    </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-danger">Update Sponsor</button>
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
