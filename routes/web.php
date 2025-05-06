<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('cms.logout');

Route::middleware(['auth.session'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.statistics.index');
    })->name('dashboard');
    
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/event/{event}/ajax-book', [EventController::class, 'ajaxBook'])->name('events.book');

Route::get('/booking', [BookingController::class, 'index'])->name('booking.history');

});