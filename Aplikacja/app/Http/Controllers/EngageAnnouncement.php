<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\user_has_announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EngageAnnouncement extends Controller
{
    public function engage(Announcement $announcement){
        if($announcement->creator_id==Auth::id())
            return back()->withErrors(['Nie możesz zgłosić się swojego ogłoszenia']);
        if(user_has_announcement::where(['user'=>Auth::id(),'announcement'=>$announcement->id])->exists())
            return back()->withErrors(['Już zgłosiłeś się do tego ogłoszenia']);
        user_has_announcement::create(['announcement'=>$announcement->id,'user'=>Auth::id()]);
        return back()->with('status','Pomyślnie zgłoszono się do ogłoszenia');
    }
    public function get_engaged_users(Request $request){

    }
    public function get_engaged_announcements(Request $request){

    }
   
}
