<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\News;
use App\Models\Partner;
use App\Models\Sponsor;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $event_count=Event::all()->count();
        $ticket_count=Ticket::all()->count();
        $sponsor_count=Sponsor::all()->count();
        $partner_count=Partner::all()->count();
        $vacancy_count=Vacancy::all()->count();
        $news_count=News::all()->count();
        $users_count=User::all()->count();
        $events=Event::orderBy('id', 'asc')->paginate(6);
        return view('admin.home.index',[
            'event_count'=>$event_count,
            'ticket_count'=>$ticket_count,
            'sponsor_count'=>$sponsor_count,
            'partner_count'=>$partner_count,
            'vacancy_count'=>$vacancy_count,
            'news_count'=>$news_count,
            'users_count'=>$users_count,
            'events'=>$events,
        ]);
    }
}
