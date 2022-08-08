@extends('layouts.admin')
@section('title', 'admin - create ticket')
@section('content')


    <style>
        .key_topic {
            border: 1px solid #b9bec5;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
        }
    </style>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif
    <div class="row g-0">
        <div class="col-lg-12 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Ticket Settings</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{route('ticket.store')}}" method="POST" >
                        @csrf
                        <div class="row gx-2">
                            {{----------------------------type----------------------------------}}
                            <div class="mb-3">
                                <label class="form-label" for="event-type">1st type<span
                                        style="color: red">*</span></label>
                                <select class="form-select" id="event-type" name="type_id" required>
                                    <option >Select 1st type</option>
                                    @foreach($types as $type)
                                        <option value="{{$type['id']}}">{{$type['title']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{----------------------------2nd type----------------------------------}}
                            <div class="mb-3">
                                <label class="form-label" for="event-type">2nd type<span
                                        style="color: red">*</span></label>
                                <select class="form-select" id="event-type" name="other_type_id">
                                    <option >Select 2nd type</option>
                                    @foreach($other_types as $other_type)
                                        <option value="{{$other_type['id']}}">{{$other_type['title']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Ticket price</label><span style="color: red">*</span>
                                <input class="form-control" name="price" id="event-name" type="number" placeholder="Ticket price" >
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Ticket sale</label>
                                <input class="form-control" name="sale" id="event-name" type="number" placeholder="Ticket sale not required" >
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Currency</label>
                                <select class="form-select" id="event-type" name="currency" required>
                                    <option value="$">$</option>
                                    <option value="€">€</option>
                                    <option value="₽">₽</option>
                                    <option value="£">£</option>
                                </select>
                            </div>
                            {{----------------------------event----------------------------------}}
                            <div class="mb-3">
                                <label class="form-label" for="event-type">Event<span
                                        style="color: red">*</span></label>
                                <select class="form-select" id="event-type" name="event_id" required>
                                    @foreach($events as $event)
                                        <option value="{{$event['id']}}">{{$event['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{----------------------------Items----------------------------------}}
                            <div class="mb-3">
                                <label for="organizerMultiple">Ticket items<span
                                        style="color: red">*</span></label>
                                <select class="form-select js-choice" id="organizerMultiple" multiple="multiple"
                                        size="1"
                                        name="items[]" required="required"
                                        data-options='{"removeItemButton":true,"placeholder":true}'>
                                    @foreach($items as $item)
                                        <option value="">Select Ticket Items...</option>
                                        <option value="{{$item['id']}}">{{$item['title']}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select one or multiple</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="event-type">Have gradient or not ?<span
                                        style="color: red">*</span></label>
                                <input type="hidden" name="attractive" value="0">
                                <input type="checkbox" name="attractive" value="1">
                            </div>
                            <br>
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

