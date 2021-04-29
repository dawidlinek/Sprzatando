<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BanController;
use App\Http\Controllers\EngageAnnouncement;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtherController;
use App\Http\Middleware\AdminCheck;
use App\Models\Announcement;
use App\Models\Categories;
use App\Models\User;
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
Route::get('/ranking',[OtherController::class,'ranking']);

Route::any('/search',[AnnouncementController::class,'search']);

Route::get('/singleOffer/{announcement}',[AnnouncementController::class,'SingleOffer'])->name('singleOffer');
Route::get('/',[OtherController::class,'dashboard']);

Route::redirect('/dashboard','/dashboard/announcement')->middleware(['auth:sanctum', 'verified'])->name('dashboard');
Route::post('/report/{announcement}', [BanController::class, 'report_announcement']);

Route::post('/login', [LoginController::class,'login']);
Route::get('/dashboard/announcement/{announcement}/discard/{user}',[EngageAnnouncement::class,'discard']);
Route::post('/dashboard/announcement/{announcement}/accept/{user}',[EngageAnnouncement::class,'accept']);
Route::post('/dashboard/announcement/{announcement}/rating',[AnnouncementController::class,'rating']);
Route::middleware(['auth'])->group(function () {

    Route::get('/logout', 'LoginController@logout');
    Route::view('/email/verify','auth.verify-email')->name('verification.notice');
    Route::get('/dashboard/zlecenia',[EngageAnnouncement::class,'get_engaged_announcements']);
    Route::resource('/dashboard/announcement', AnnouncementController::class);

    Route::get('/email/verify/{id}/{hash}',[AuthController::class,'EmailVerify'])->middleware('signed')->name('verification.verify');
    Route::get('/report/{announcement}', [BanController::class, 'report_announcement']);

    Route::post('/email/verification-notification', [AuthController::class,'SendEmail'])->middleware('throttle:6,1')->name('verification.send');
    Route::post('/engage/{announcement}', [EngageAnnouncement::class, 'engage']);
    Route::post('/user/profile', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/password', [UserController::class, 'updatePassword'])->name('user.update.password');

    Route::middleware(AdminCheck::class)->group(function(){
        Route::post('/user/ban',[UserController::class,'ban_user']);
        Route::get('/dashboard/reported',[BanController::class,'reported']);
        Route::get('/dashboard/users',[OtherController::class,'users']);
        Route::any('/ban/{announcement}',[BanController::class,'ban_announcement']);
        Route::get('/restore/{announcement}',[BanController::class,'restore_announcement']);
    });
});

\PWA::routes();

