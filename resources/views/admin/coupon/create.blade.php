@extends('layouts.admin')
@section('title', 'admin - create coupon ')
@section('content')


    <div class="row g-0">
        <div class="col-lg-12 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Create Coupon</h5>
                </div>
                @if (session('success'))
                    <div class="alert alert-danger" role="alert">
                        <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    </div>
                @endif
                <div class="card-body bg-light">
                    <form action="{{route('coupons.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Discount</label><span style="color: red">*</span>
                                <input class="form-control" name="discount" id="event-name" type="number"  >
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Percent or Currency</label>
                                <select class="form-select" id="event-type" name="percent_amount" required>
                                    <option value="%">%</option>
                                    <option value="$">$</option>
                                    <option value="€">€</option>
                                    <option value="£">£</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">User Full Name</label>
                                <input class="form-control" name="user" id="event-name" type="text" placeholder="Who should attend" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">User's email</label>
                                <input class="form-control" name="email" id="event-name" type="text" placeholder="Who should attend" required>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="start-date"> Start Date <span style="color: red">*</span></label>
                                <input type="date" name="creation_date"
                                       placeholder="d/m/y"
                                       required >
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label" for="start-date"> Expire date<span style="color: red">*</span></label>
                                <input type="date" name="expiration_date"
                                       placeholder="d/m/y"
                                       required >
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

