<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscriber=subscriber::orderBy('created_at','desc')->paginate(15);

        return view('admin.subscribers.index',[
            'subscribers'=>$subscriber
        ]);
    }
}
