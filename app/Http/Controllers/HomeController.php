<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\news;
use App\Models\Order;
use App\Models\partner;
use App\Models\sponsor;
use App\Models\testimonial;
use App\Models\ticket;
use App\Models\User;
use App\Models\vacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $event_count=event::all()->count();
        $ticket_count=ticket::all()->count();
        $sponsor_count=sponsor::all()->count();
        $partner_count=partner::all()->count();
        $vacancy_count=vacancy::all()->count();
        $news_count=news::all()->count();
        $users_count=user::all()->count();
        $events=event::orderBy('id', 'asc')->paginate(6);
        $testimonial_count=testimonial::all()->count();
        $orders_count=Order::all()->count();

        return view('admin.home.index',[
            'event_count'=>$event_count,
            'ticket_count'=>$ticket_count,
            'sponsor_count'=>$sponsor_count,
            'partner_count'=>$partner_count,
            'vacancy_count'=>$vacancy_count,
            'news_count'=>$news_count,
            'users_count'=>$users_count,
            'events'=>$events,
            'testimonial_count'=>$testimonial_count,
            'orders_count'=>$orders_count,
        ]);
    }
}
