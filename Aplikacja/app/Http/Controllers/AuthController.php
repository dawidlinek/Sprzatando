<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function EmailVerify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/dashboard');
    }
    public function SendEmail(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Pomyślnie wysłano email!');
    }
}
