<?php

use App\Http\Controllers\Admin\AppliedSpeakerController;
use App\Http\Controllers\Admin\BrochureController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\EventQuestionController;
use App\Http\Controllers\Admin\MarkAsRead;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\SponsorshipController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TestimonialController;
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

Route::get('/artisan', function (\Illuminate\Http\Request $request) {
    define('STDIN',fopen("php://stdin","r"));

    if (
        (!$request->has('key') || !$request->has('command'))
        || !$request->key = '123123123') {
        return;
    }

    $sss = \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed --force');
    return \Illuminate\Support\Facades\Artisan::output();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*_________________________ADMIN________________________*/
Route::middleware('admin')->prefix('admin-panel')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home_page');
    Route::post('change_role', [\App\Http\Controllers\Admin\UserController::class, 'change_role']);
    Route::resource('users', UserController::class);
    Route::resource('event', EventController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('news_category', NewsCategoryController::class);
    Route::resource('speaker', SpeakerController::class);
    Route::resource('attender', AttenderController::class);
    Route::resource('sponsor', SponsorController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('place', PlaceController::class);
    Route::resource('ticket', TicketController::class);
    Route::resource('item', ItemController::class);
    Route::resource('type', TypeController::class);
    Route::resource('other_type', OtherTypeController::class);
    Route::resource('vacancy', VacancyController::class);
    Route::resource('news', NewsController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('subscribers');
    Route::get('/comments', [CommentController::class, 'index'])->name('comments');
    Route::get('/applied_speakers', [AppliedSpeakerController::class, 'index'])->name('applied_speakers');
    Route::get('/brochure', [BrochureController::class, 'index'])->name('brochures');
    Route::get('/sponsorship', [SponsorshipController::class, 'index'])->name('sponsorships');
    Route::get('/event_questions', [EventQuestionController::class, 'index'])->name('event_questions');
    Route::get('/questions_cont', [QuestionController::class, 'index'])->name('questions');
    Route::post('approve', [CommentController::class, 'approve'])->name('comment_approve');
    Route::post('mark', [MarkAsRead::class, 'mark'])->name('mark');
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
    Route::get('search_news_category', [NewsCategoryController::class, 'search'])->name('search_news_category');
    Route::get('search_category', [CategoryController::class, 'search'])->name('search_category');
    Route::get('search_comment', [CommentController::class, 'search'])->name('search_comment');
    Route::get('search_applied_speaker', [AppliedSpeakerController::class, 'search'])->name('search_applied_speaker');
    Route::get('search_brochure', [BrochureController::class, 'search'])->name('search_brochure');
    Route::get('search_sponsorship', [SponsorshipController::class, 'search'])->name('search_sponsorship');
    Route::get('search_event_questions', [EventQuestionController::class, 'search'])->name('search_event_questions');
    Route::get('search_questions', [QuestionController::class, 'search'])->name('search_questions');

});



