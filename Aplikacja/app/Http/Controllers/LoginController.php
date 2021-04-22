<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $name = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $name, 'password' => $password]))
        {
            // return auth()->user()->ban_ending_at;
            if(auth()->user()->ban_ending_at){
                $data=strtotime(auth()->user()->ban_ending_at);
            if($data>time()){
            Auth::logout();
            return back()->withErrors(['Na to konto został nałożony ban. Poczekaj do '.date('d-m-Y',$data).' lub skontaktuj się z administratorem']);
            }}
            if($request->redirect)
            return redirect('/singleOffer/'.$request->redirect);
            else
            return redirect('/dashboard');
        }
        else
        {
            return back()->withErrors(['Podane dane nie pasują']);
        }
    }
    public function logout()
    {
        Auth::logout();
        Redirect::to('/');
    }
}
