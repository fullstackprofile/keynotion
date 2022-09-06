@extends('layouts.admin')
@section('title', 'admin - details')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" ></div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
            <h5>Order Details: #{{$order->order_number}}</h5>
            <p class="fs--1">{{Carbon\Carbon::parse(strtotime($order['created_at']))->format('d F Y')}}</p>
            <div><strong class="me-2">Status: </strong>
                <select id="select_status{{$order->id}}" style="background: white;">
                    <option @if($order['status'] == 'Pending Payment') selected @endif><h6>Pending Payment</h6></option>
                    <option @if($order['status'] == 'processing') selected @endif><h6>Processing</h6></option>
                    <option @if($order['status'] == 'On Hold') selected @endif><h6>On Hold</h6></option>
                    <option @if($order['status'] == 'Completed') selected @endif><h6>Completed</h6></option>
                    <option @if($order['status'] == 'Cancelled') selected @endif><h6>Cancelled</h6></option>
                    <option @if($order['status'] == 'Refunded') selected @endif><h6>Refunded</h6></option>
                    <option @if($order['status'] == 'Failed') selected @endif><h6>Failed</h6></option>
                    <option @if($order['status'] == 'Draft') selected @endif><h6>Draft</h6></option>
                </select>
                <script>
                    $('#select_status{{$order->id}}').change(() => {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content'),
                            },
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'status': $('#select_status{{$order->id}}').val(),
                                'order_id': {{$order->id}}
                            },
                            type: 'POST',
                            url: '/admin-panel/change_status'
                        });
                    })
                </script>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3 fs-0">Company Details</h5>
                    <h6 class="mb-2">{{$order->company->first_name}} {{$order->company->last_name}}</h6>
                    <h6 class="mb-2">Company name : {{$order->company->company_name}} </h6>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3 fs-0">Billing Address </h5>
                    <h6 class="mb-2">Country or Region :{{$order->company->country_region}} </h6>
                    <h6 class="mb-2">Street Address: {{$order->company->street_address}} </h6>
                    <h6 class="mb-2">Town or City: {{$order->company->town_city}} </h6>
                    <h6 class="mb-2">Postcode : {{$order->company->postcode_zip}} </h6>
                    <h6 class="mb-2">Phone : {{$order->company->phone}} </h6>
                    <h6 class="mb-2">Email : {{$order->company->email}} </h6>
                    <h6 class="mb-2">Vat Number : {{$order->company->vat_number}} </h6>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h5 class="mb-3 fs-0">Delegators </h5>
                   @foreach($order->delegaters as $delegater)
                       @if($delegater->order_id == $order->id)
                            <h6 class="mb-2">Full Name: {{$delegater->full_name}} </h6>
                            <h6 class="mb-2">Job Title: {{$delegater->job_title}} </h6>
                            <h6 class="mb-2">Email: {{$delegater->email}} </h6>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive fs--1">
                <table class="table table-striped border-bottom">
                    <thead class="bg-200 text-900">
                    <tr>
                        <th class="border-0">Products</th>
                        <th class="border-0 text-center">Quantity</th>
                        <th class="border-0 text-end">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="border-200">
                        @foreach($order->order_items as $order_item)
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">{{$order_item->ticket_title}}</h6>
                        </td>
                        <td class="align-middle text-center">{{$order_item->quantity}}</td>
                        <td class="align-middle text-end">{{$order_item->currency}}{{$order_item->price}}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row g-0 justify-content-end">
                <div class="col-auto">
                    <table class="table table-sm table-borderless fs--1 text-end">
                        <tbody><tr>
                            <th class="text-900">Subtotal:</th>
                            <td class="fw-semi-bold">{{$order->subtotal}}</td>
                        </tr>
                        <tr>
                            <th class="text-900">VAT</th>
                            <td class="fw-semi-bold">{{$order->vat}}</td>
                        </tr>
                        <tr class="border-top">
                            <th class="text-900">Total:</th>
                            <td class="fw-semi-bold">{{$order->Total}}</td>
                        </tr>
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>
@endsection
