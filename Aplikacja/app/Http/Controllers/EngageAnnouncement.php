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
        $announcements= auth()->user()->engaged;
        return view('dashboard.zlecenia',compact('announcements'));
    }
    public function discard($announcement,$user){
        if(Announcement::findOrFail($announcement)->creator_id!=auth()->id())
        return response('Nieautoryzowany',401);
        user_has_announcement::where(['announcement'=>$announcement,'user'=>$user])->update(['status'=>'discarded']);
        return response()->json(['status'=>true]);
    }
    public function accept($announcement,$user){
        if(Announcement::findOrFail($announcement)->creator_id!=auth()->id())
        return back()->withErrors(['Nie masz odpowidnich uprawnień do wykonania tej akcji']);
        user_has_announcement::where(['announcement'=>$announcement])->update(['status'=>'finished']);
        user_has_announcement::where(['announcement'=>$announcement,'user'=>$user])->update(['status'=>'selected']);
        Announcement::findOrFail($announcement)->update(['status'=>'finished']);
        return back()->with('status','Pomyślnie wybrano zleceniobiorce');


    }
   
}
