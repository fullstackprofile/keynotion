@extends('layouts.admin')
@section('title', 'Admin - Users')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
