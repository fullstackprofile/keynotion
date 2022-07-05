<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\VacancyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\AttenderController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\OtherTypeController;


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*_________________________ADMIN________________________*/
Route::middleware( 'admin' )->prefix('admin-panel')->group(function (){
        Route::get('/home', [HomeController::class, 'index'])->name('home_page');
        Route::post('change_role',[\App\Http\Controllers\Admin\UserController::class,'change_role']);
        Route::resource('users',UserController::class);
        Route::resource('event',EventController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('speaker',SpeakerController::class);
        Route::resource('attender',AttenderController::class);
        Route::resource('sponsor',SponsorController::class);
        Route::resource('partner',PartnerController::class);
        Route::resource('place',PlaceController::class);
        Route::resource('ticket',TicketController::class);
        Route::resource('item',ItemController::class);
        Route::resource('type',TypeController::class);
        Route::resource('other_type',OtherTypeController::class);
        Route::resource('vacancy',VacancyController::class);
        Route::resource('news',NewsController::class);
        Route::get('get-states', [EventController::class, 'getStates'])->name('getStates');
        Route::get('get-cities', [EventController::class, 'getCities'])->name('getCities');
        Route::get('search_ticket', [TicketController::class, 'search'])->name('search_ticket');
        Route::get('search_events', [EventController::class, 'search'])->name('search_events');
        Route::get('search_item', [ItemController::class, 'search'])->name('search_item');
        Route::get('search_type', [TypeController::class, 'search'])->name('search_type');
        Route::get('search_other_type', [OtherTypeController::class, 'search'])->name('search_other_type');
        Route::get('search_user', [UserController::class, 'search'])->name('search_user');
        Route::get('search_speaker', [SpeakerController::class, 'search'])->name('search_speaker');
        Route::get('search_attender', [AttenderController::class, 'search'])->name('search_attender');
        Route::get('search_sponsor', [SponsorController::class, 'search'])->name('search_sponsor');
        Route::get('search_partner', [PartnerController::class, 'search'])->name('search_partner');
        Route::get('search_place', [PlaceController::class, 'search'])->name('search_place');
        Route::get('search_vacancy', [VacancyController::class, 'search'])->name('search_vacancy');
        Route::get('search_news', [NewsController::class, 'search'])->name('search_news');
});



