<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\adminEventController;

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


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        if(!auth()->user()->is_admin){
            return to_route('dashboard');
        }
            return to_route('admin.dashboard');
    });
    Route::get('/agenda', function () {return view('dashboard');})->name('dashboard');
    Route::get('/getEvents',[EventController::class,'index'])->name('events');
    Route::get('/all/event',[EventController::class,'allEvent'])->name('all.event');
    Route::get('/valide/agenda/events',[EventController::class,'evendValide'])->name('valide.event');
    Route::post('/event/store',[EventController::class,'store'])->name('store.event');
    Route::put('/event/update/{id}',[EventController::class,'update'])->name('update.event');
    Route::get('/event/export', [EventController::class, 'EventsExport'])->name('export.event');

    // admin routes
        Route::group(['middleware'=> 'is_admin', 'as' => 'admin.'],function () {
            Route::post('/admin/event/store',[adminEventController::class,'store'])->name('store.event');
            Route::get('/admin/agenda', function () {return view('admin.dashboard');})->name('dashboard');
            Route::get('/admin/getEvents',[adminEventController::class,'index'])->name('events');
            Route::put('/admin/event/drop/update/{id}',[adminEventController::class,'updateEventByDrop'])->name('events.drop.update');
            Route::get('/admin/all/event',[adminEventController::class,'allEvent'])->name('all.event');
            Route::get('/admin/valide/agenda/events',[adminEventController::class,'evendValide'])->name('valide.event');
            Route::put('/admin/event/update/{id}',[adminEventController::class,'update'])->name('update.event');
            Route::delete('/admin/event/multiple/edit',[adminEventController::class,'multiplDeleteAndEditEvents'])->name('delete.multipl.event');
            Route::get('/admin/event/delete/{id}',[adminEventController::class,'delete'])->name('delete.event');

    });
});