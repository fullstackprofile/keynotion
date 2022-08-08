@extends('layouts.admin')
@section('title', 'Admin - All Categories')
@section('content')
    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-danger" role="alert">
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
        @endif
        <div class="card-body pt-0">
            <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-ec5bc8c3-3ef8-4246-a5ef-f111374005e5" id="dom-ec5bc8c3-3ef8-4246-a5ef-f111374005e5">
                    <div class="table-responsive scrollbar">
                        <table class="table table-hover table-striped overflow-hidden">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th class="text-end" scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category['id']}}</td>
                                <td>{{$category['title']}}</td>
                                <td class="text-end">
                                    <div>
                                        <a href="{{route('category.edit' , $category['id'])}}" style="text-decoration: none">
                                            <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            </button>
                                            <span class="text-500 fas fa-edit"></span>
                                        </a>
                                        <form action="{{route('category.destroy' , $category['id'])}}" method="post"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
