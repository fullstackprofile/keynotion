@extends('layouts.admin')
@section('title', 'Admin - create attender')
@section('content')


    <div class="row g-0">
        <div class="col-lg-12 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Who Should Attend</h5>
                </div>
                @if (session('success'))
                    <div class="alert alert-danger" role="alert">
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
                <div class="card-body bg-light">
                    <form action="{{route('attender.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Attender Title</label>
                                <input class="form-control" name="title" id="event-name" type="text" placeholder="Who should attend" required>
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

@endsection

