<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/test', function(){
    $d1 = now();
    $d2 = now()->addMonths(72);
    $d2 = now()->addMonthsNoOverflow(72);

    dd( $d2 );
});


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/about', function(){

    abort(503, "this page under dev");

    return view('about');
});
Route::get('/opinions', function(){
    abort(503, "this page under dev");
    return view('opinions');
});
Route::get('/contact', function(){
    abort(503, "this page under dev");
    return view('contact');
});
