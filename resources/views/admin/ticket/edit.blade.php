@extends('layouts.admin')
@section('title', 'Admin - update ticket')
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
                    <form action="{{route('ticket.update',$ticket['id'] )}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="row gx-2">
                            <div class="mb-3">
                                <label class="form-label" for="event-type">Ticket Type</label>
                                <select class="form-select" id="event-type" name="type_id">
                                    @foreach($types as $type)
                                        <option value="{{$type['id']}}"
                                                @if($type['id'] == $ticket['type_id'])  selected
                                            @endif >{{$type['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row gx-2">
                                <div class="mb-3">
                                    <label class="form-label" for="event-type">Ticket Type</label>
                                    <select class="form-select" id="event-type" name="other_type_id">
                                        @foreach($other_types as $other_type)
                                            <option value="{{$other_type['id']}}"
                                                    @if($other_type['id'] == $ticket['other_type_id'])  selected
                                                @endif >{{$other_type['title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Ticket price</label><span style="color: red">*</span>
                                <input class="form-control" name="price" id="event-name" type="text" placeholder="Ticket price" value="{{$ticket['price']}}" >
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="event-name">Ticket sale</label>
                                <input class="form-control" name="sale" id="event-name" type="text" placeholder="Ticket sale not required"  value="{{$ticket['sale']}}">
                            </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label" for="event-name">Currency</label>
                                    <select class="form-select" id="event-type" name="currency" required>
                                        @if($ticket['currency']) <option selected>{{$ticket['currency']}}</option>@endif
                                        <option value="$">$</option>
                                        <option value="€">€</option>
                                        <option value="₽">₽</option>
                                        <option value="£">£</option>
                                    </select>
                                </div>
                            {{----------------------------Event----------------------------------}}
                            <div class="mb-3">
                                <label class="form-label" for="event-type">Event<span
                                        style="color: red">*</span></label>
                                <select class="form-select" id="event-type" name="event_id" required>
                                    @foreach($events as $event)
                                        <option value="{{$event['id']}}"
                                                @if($event['id'] == $ticket['event_id'])  selected
                                            @endif >{{$event['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{----------------------------Attenders----------------------------------}}
                            <div class="mb-3">
                                <label for="organizerMultiple">Ticket items <span style="color: red">*</span></label>
                                <select class="form-select js-choice" id="organizerMultiple" multiple="multiple" size="1"
                                        name="items[]"  data-options='{"removeItemButton":true,"placeholder":true}'>
                                    @foreach($items as $item)
                                        <option
                                            value="{{$item['id']}}"
                                            @if(in_array($item['id'],$items_selected))
                                                selected
                                            @endif
                                        > {{$item['title'] }}  </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select one or multiple</div>
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

