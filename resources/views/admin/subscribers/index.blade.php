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
                            <h5 class="d-inline-block">Subscribers</h5>
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
                                <th scope="col">Email</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($subscribers as $subscriber)
                                <tr class="align-middle">
                                    <td class="text-nowrap">{{$subscriber['id']}}</td>
                                    <td class="text-nowrap">{{$subscriber['email']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $subscribers->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
