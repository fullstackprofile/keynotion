@extends('layouts.admin')
@section('title', 'admin - testimonials')
@section('content')

    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-12 mb-3">
                    <div class="row justify-content-center justify-content-sm-between">
                        <div class="col-sm-auto text-center">
                            <h5 class="d-inline-block">Testimonials</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                     aria-labelledby="tab-dom-ec5bc8c3-3ef8-4246-a5ef-f111374005e5"
                     id="dom-ec5bc8c3-3ef8-4246-a5ef-f111374005e5">
                    <div class="table-responsive scrollbar">
                        <table class="table table-hover table-striped overflow-hidden">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Stars</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Profession</th>
                                <th scope="col">Position</th>
                                <th scope="col">Company</th>
                                <th scope="col">Company Logo</th>
                                <th class="text-end" scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($testimonials as $testimonial)
                                <tr class="align-middle">
                                    <td class="text-nowrap">{{$testimonial['id']}}</td>
                                    <td class="text-nowrap">{{$testimonial['star']}}</td>
                                    <td class="text-nowrap">{{$testimonial['full_name']}}</td>
                                    <td class="text-nowrap">{{$testimonial['profession']}}</td>
                                    <td class="text-nowrap">{{$testimonial['heading']}}</td>
                                    <td class="text-nowrap">{{$testimonial['company']}}</td>
                                    <td class="text-nowrap">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-xl">
                                                <img class="rounded-circle" src="{{$testimonial->getFirstMediaUrl('testimonial_logo')}}" alt="">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div>
                                            <a href="{{route('testimonial.edit' , $testimonial['id'])}}" style="text-decoration: none">
                                                <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                </button>
                                                <span class="text-500 fas fa-edit"></span>
                                            </a>
                                            <form action="{{route('testimonial.destroy' , $testimonial['id'])}}" method="post"
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
                        {!! $testimonials->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
