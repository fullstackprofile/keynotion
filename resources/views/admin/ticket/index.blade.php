@extends('layouts.admin')
@section('title', 'admin - All Tickets')
@section('content')

    <div class="card mb-3" xmlns="http://www.w3.org/1999/html">
        <div class="card-body">
            <div class="row g-0">
                <div class="col-12 mb-3">
                    <div class="row justify-content-center justify-content-sm-between">
                        <div class="col-sm-auto text-center">
                            <h5 class="d-inline-block">Tickets</h5>
                        </div>
                        <div  class="col-sm-auto text-center">
                            <div class="search-box" data-list="{&quot;valueNames&quot;:[&quot;title&quot;]}">
                                <form class="position-relative show" data-bs-toggle="search" data-bs-display="static" aria-expanded="true" action="{{route('search_ticket')}}" method="get">
                                    <input class="form-control search-input fuzzy-search" type="search" name="search" placeholder="Search..." aria-label="Search">
                                    <svg class="svg-inline--fa fa-search fa-w-16 search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($tickets as $ticket)
                <div class="col-lg-4 border mb-2">
                    <div class="h-100">
                        <div class="text-center p-2" style="background-color: #ed9b9b">
                            <h5 class="fw-normal my-0"><b>
                                Ticket For ::
                                @foreach($events as $event)
                                    @if($ticket['event_id']==$event['id']) {{$event['title']}} @endif
                                @endforeach
                                </b> </h5>
                            <b class="mt-3" style="color: black">
                                @foreach($types as $type)
                                    @if($ticket['type_id']==$type['id']) {{$type['title']}} @endif
                                @endforeach
                            </b>
                            <p style="color: black">
                                @foreach($other_types as $other_type)
                                    @if($ticket['other_type_id']==$other_type['id']) {{$other_type['title']}} @endif
                                @endforeach
                            </p>
                        </div>
                        <div class="text-center" style="display: flex;justify-content: center;">
                            @if($ticket['sale']!=NULL)
                                <h5 class="fw-medium" style="color: #d12929"><s>{{$ticket['price']}}{{$ticket['currency']}}</s></h5>
                                <h2 class="fw-medium " style="margin: 5px">{{$ticket['sale']}}{{$ticket['currency']}}</h2>
                            @else
                                <h2 class="fw-medium ">{{$ticket['price']}}{{$ticket['currency']}}</h2>
                            @endif
                        </div>
                        <div class="text-center ">
                            <ul class="list-unstyled mt-3">
                                @foreach($ticket->items as $item)
                                    <li class="py-1">{{ $item->title }}</li>
                                    <hr class="border-bottom-0 m-0">
                                @endforeach

                            </ul>
                            <div>
                                <a href="{{route('ticket.edit' , $ticket['id'])}}" style="text-decoration: none;font-size: 20px;color: #812a5b">
                                    <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    </button>
                                    <span class=" fas fa-edit"></span>
                                </a>
                                <form action="{{route('ticket.destroy' , $ticket['id'])}}" method="post"
                                      style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn p-0 ms-2 delete-btn" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" style="font-size: 20px;color: #d12929">
                                        <span class=" fas fa-trash-alt"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {!! $tickets->links() !!}
            </div>
        </div>
    </div>
@endsection
