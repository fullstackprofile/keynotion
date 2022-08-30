<?php

use App\Http\Controllers\Api\AppliedSpeakerController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BrochureController;
use App\Http\Controllers\Api\Cart\CartController;
use App\Http\Controllers\Api\Cart\CheckoutController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\EventQuestionController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\SponsorshipRequestController;
use App\Http\Controllers\Api\SubscriberController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\VacancyController;
use App\Http\Middleware\AuthWhenHasBearerSanctum;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'Its API';
});


Route::apiResources(['events' => EventController::class]);
Route::apiResources(['tickets' => TicketController::class]);
Route::get('/ticket_related', [TicketController::class, 'show']);
Route::get('/past/events', [EventController::class, 'showPast']);
Route::apiResources(['vacancies' => VacancyController::class]);
Route::apiResources(['news' => NewsController::class]);
Route::apiResources(['testimonials' => TestimonialController::class]);
Route::apiResources(['order' => OrderController::class]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/update-user', [AuthController::class, 'update']);
    Route::get('/billing',[OrderController::class,'billingAddress']);
    Route::post('/update/billing', [OrderController::class, 'updateBilling']);
});

Route::middleware('guest')->group(function () {
    Route::post('/subscriber-store', [SubscriberController::class, 'storeSubscriber']);
    Route::post('/comment-store', [CommentController::class, 'storeComment']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::post('/apply_speaker', [AppliedSpeakerController::class, 'storeApplySpeaker']);
    Route::post('/brochure', [BrochureController::class, 'storeBrochure']);
    Route::post('/sponsorship', [SponsorshipRequestController::class, 'storeSponsorship']);
    Route::post('/questions', [EventQuestionController::class, 'StoreEventQuestion']);
    Route::post('/questions_contact', [QuestionController::class, 'StoreQuestion']);
    Route::post('/register', [AuthController::class, 'storeRegister']);
    Route::post('/verify', [AuthController::class, 'verifyCode']);
    Route::post('/resend-verify', [AuthController::class, 'resendCode']);
    Route::post('/login', [AuthController::class, 'storeLogin']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'reset']);
    Route::get('/news_home', [NewsController::class, 'showHome']);
    Route::post('order/store', [OrderController::class, 'store']);
});

Route::middleware(AuthWhenHasBearerSanctum::class,)->group(function () {
    Route::apiResource('cart', CartController::class)->only(['index', 'store', 'destroy']);
    Route::post('cart/coupon', [CartController::class, 'coupon']);
    Route::apiResource('checkout', CheckoutController::class)->only(['store']);
});
