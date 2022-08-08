@extends('layouts.admin')
@section('title', 'admin - create sponsor')
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

    <div class="row g-0">
        <div class="col-lg-12 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Sponsor's detail</h5>
                </div>
                @if (session('success'))
                    <div class="alert alert-danger" role="alert">
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
                <div class="card-body bg-light">
                    <form action="{{route('sponsor.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card cover-image mb-3 logo" >
                            <img id="file-ip-1-preview" class="card-img-top img" src="../../assets/img/generic/13.jpg"
                                 alt="" >
                        </div>
                        <input name="logo" type="file" id="upload-cover-image" accept="image/*"
                               onchange="showPreview(event);" style="margin: 7px">
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Sponsor Name</label>
                                <input class="form-control" name="name" id="event-name" type="text" placeholder="Who should attend" required>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-danger">Save </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
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

