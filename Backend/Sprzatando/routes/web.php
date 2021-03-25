<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BanController;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

// Ssl validation
// Route::get('/.well-known/pki-validation/BCC67262E155DCE0BE3607BC68D3568B.txt');


Route::view('/search','search');
Route::get('/report/{announcement}',[BanController::class,'report_announcement']);
Route::get('/', function () {
    return view('welcome',['announcements'=>Announcement::latest()->where('status','active')->Orwhere('status','reported')->take(5)->get()]);
});
Route::get('/offer/show', function () {
    return view('offer.show_offer');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    return redirect('/dashboard/announcement');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::middleware(['auth'])->group(function () {
Route::resource('/dashboard/announcement', AnnouncementController::class);


Route::post('/user/profile', [UserController::class, 'update'])->name('user.update');
Route::post('/user/password', [UserController::class, 'updatePassword'])->name('user.update.password');

});
