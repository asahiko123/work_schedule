<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'schedule','middleware'=>'auth'],function(){
    Route::get('get_events',[ScheduleController::class],'getEvents')->name('schedules.event');
    Route::get('index',[ScheduleController::class,'index'])->name('schedules.index');
    Route::get('create',[ScheduleController::class,'create'])->name('schedules.create');
    Route::post('store',[ScheduleController::class,'store'])->name('schedules.store');
    Route::post('delete/{id}',[ScheduleController::class,'destroy'])->name('schedules.delete');
    Route::post('update/{id}',[ScheduleController::class,'update'])->name('schedules.update');
    Route::post('calendar-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
});
