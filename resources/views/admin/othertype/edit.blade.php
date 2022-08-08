@extends('layouts.admin')
@section('title', 'admin - edit other type for ticket')
@section('content')

    <div class="row g-0">
        <div class="col-lg-12 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Other Type for ticket details</h5>
                </div>
                @if (session('success'))
                    <div class="alert alert-danger" role="alert">
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
                <div class="card-body bg-light">
                    <form  action="{{route('other_type.update',$other_types['id'] )}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Other Type Title</label>
                                <input class="form-control" value="{{$other_types['title']}}" name="title" id="event-name" type="text" placeholder="Item   Title" required>
                            </div>

                            <div class="col-4">
                                <button type="submit" class="btn btn-danger">Save other type</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

