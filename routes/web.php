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

Route::group(['prefix'=>'schedule','middleware'=>['auth','can:user-higher']],function(){
    Route::match(['get','post'],'index',[ScheduleController::class,'index'])->name('schedules.index');
});

Route::group(['prefix'=>'schedule','middleware'=>['auth','can:admin-higher']],function(){
    Route::get('create',[ScheduleController::class,'create'])->name('schedules.create');
    Route::post('store',[ScheduleController::class,'store'])->name('schedules.store');
    Route::post('delete',[ScheduleController::class,'destroy'])->name('schedules.delete');
    Route::post('update',[ScheduleController::class,'update'])->name('schedules.update');
});

Route::group(['prefix'=>'schedule','middleware'=>['auth','can:system-only']],function(){
    //
});
