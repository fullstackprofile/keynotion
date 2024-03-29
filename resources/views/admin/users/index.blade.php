@extends('layouts.admin')
@section('title', 'admin - users')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
                <div class="col-12 mb-3">
                    <div class="row justify-content-center justify-content-sm-between">
                        <div class="col-sm-auto text-center">
                            <h5 class="d-inline-block">Users</h5>
                        </div>
                        <div  class="col-sm-auto text-center">
                            <div class="search-box" data-list="{&quot;valueNames&quot;:[&quot;title&quot;]}">
                                <form class="position-relative show" data-bs-toggle="search" data-bs-display="static" aria-expanded="true" action="{{route('search_user')}}" method="get">
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
                <div class="tab-pane preview-tab-pane active" role="tabpanel"
                     aria-labelledby="tab-dom-ec5bc8c3-3ef8-4246-a5ef-f111374005e5"
                     id="dom-ec5bc8c3-3ef8-4246-a5ef-f111374005e5">
                    <div class="table-responsive scrollbar">
                        <table class="table table-hover table-striped overflow-hidden">
                            <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Country</th>
                                <th scope="col">Role</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr class="align-middle">
                                    <td class="text-nowrap">{{$user['first_name']}}</td>
                                    <td class="text-nowrap">{{$user['phone']}}</td>
                                    <td class="text-nowrap">{{$user['last_name']}}</td>
                                    <td class="text-nowrap">{{$user['email']}}</td>
                                    <td class="text-nowrap">{{$user['country']}}</td>
                                    <td class="text-nowrap" >
                                        <select id="select_role{{$user->id}}" style="outline: none;border: none;background: transparent;">
                                            <option @if($user['role'] == 'user') selected @endif>user</option>
                                            <option @if($user['role'] == 'sub_admin') selected @endif>sub_admin</option>
                                            <option @if($user['role'] == 'admin') selected @endif>admin</option>
                                        </select>
                                        <script>
                                            $('#select_role{{$user->id}}').change(() => {
                                                $.ajax({
                                                    headers: {
                                                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content'),
                                                    },
                                                    data: {
                                                        "_token": "{{ csrf_token() }}",
                                                        'role': $('#select_role{{$user->id}}').val(),
                                                        'user_id': {{$user->id}}
                                                    },
                                                    type: 'POST',
                                                    url: '/admin-panel/change_role'
                                                });
                                            })
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
