@extends('layouts.admin')
@section('title', 'Admin - All Venues')
@section('content')
    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-12 mb-3">
                    <div class="row justify-content-center justify-content-sm-between">
                        <div class="col-sm-auto text-center">
                            <h5 class="d-inline-block">The Venues</h5>
                        </div>
                        <div  class="col-sm-auto text-center">
                            <div class="search-box" data-list="{&quot;valueNames&quot;:[&quot;title&quot;]}">
                                <form class="position-relative show" data-bs-toggle="search" data-bs-display="static" aria-expanded="true" action="{{route('search_place')}}" method="get">
                                    <input class="form-control search-input fuzzy-search" type="search" name="search" placeholder="Search..." aria-label="Search">
                                    <svg class="svg-inline--fa fa-search fa-w-16 search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-ec5bc8c3-3ef8-4246-a5ef-f111374005e5" id="dom-ec5bc8c3-3ef8-4246-a5ef-f111374005e5">
                    <div class="table-responsive scrollbar">
                        <table class="table table-hover table-striped overflow-hidden">
                            <thead>
                            <tr>
                                <th scope="col">The Venue's cover</th>
                                <th scope="col">The Venue's logo</th>
                                <th scope="col">Title</th>
                                <th scope="col">Address</th>
                                <th class="text-end" scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($places as $place)
                                <tr>
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img class="rounded-circle" src="{{$place->getFirstMediaUrl('place_cover')}}" alt="">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img class="rounded-circle" src="{{$place->getFirstMediaUrl('place_logo')}}" alt="">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$place['title']}}</td>
                                    <td>{{$place['address']}}</td>
                                    <td class="text-end">
                                        <div>
                                            <a href="{{route('place.edit' , $place['id'])}}" style="text-decoration: none">
                                                <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                </button>
                                                <span class="text-500 fas fa-edit"></span>
                                            </a>
                                            <form action="{{route('place.destroy' , $place['id'])}}" method="post"
                                                  style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn p-0 ms-2 delete-btn" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <span class="text-500 fas fa-trash-alt"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $places->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
