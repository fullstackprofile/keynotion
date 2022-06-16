<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SpeakerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*_________________________ADMIN________________________*/
Route::middleware( 'admin' )->prefix('admin-panel')->group(function (){
        Route::get('/home', [HomeController::class, 'index'])->name('home_page');

        Route::get('/calendar', function () {
            return view('Admin.Calendar.index');
        })->name('calendar');

        Route::resource('users',UserController::class);
        Route::resource('event',EventController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('speaker',SpeakerController::class);

        Route::post('change_role',[\App\Http\Controllers\Admin\UserController::class,'change_role']);
});



