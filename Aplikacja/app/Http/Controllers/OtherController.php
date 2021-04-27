<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    //
    public function dashboard(){
        $announcements = Announcement::latest()->where('status', 'active')->Orwhere('status', 'reported')->take(3)->get();
        $categories = Categories::inRandomOrder()->limit(3)->get();
        return view('welcome', ['announcements' => $announcements, 'categories' => $categories]);
    }
    public function ranking(){
    $users=User::all();
        foreach($users as &$user){
            $user->ratings=$user->engaged()->where('status','selected')->with('details:rating,id')->get()->toArray();
            $user->ratings=array_map(fn($x)=>$x['details']['rating'],$user->ratings);
            $user->jobs=count($user->ratings);
            $user->avg=$user->jobs?round(array_sum($user->ratings)/$user->jobs,1):0;
        }
        $users=$users->toArray();

        usort($users,function($a, $b) {return $a['avg']<$b['avg'];});
        $users=array_slice($users,0,10);

        return view('ranking',compact('users'));
    }
    function sort($a, $b){
return $a['avg']<=>$b['avg'];
    }
    public function users(Request $request){
        $users=User::all();
        if($request->sort=='avg_rating'){
            foreach($users as &$user){
                $user->ratings=$user->engaged()->where('status','selected')->with('details:rating,id')->get()->toArray();
                $user->ratings=array_map(fn($x)=>$x['details']['rating'],$user->ratings);
                $user->jobs=count($user->ratings);
                $user->avg=$user->jobs?round(array_sum($user->ratings)/$user->jobs,1):0;
            }
            $users=$users->sortBy('avg');

            // usort($users,function($a, $b) {return $a['avg']>$b['avg'];});
        }
        return view('dashboard.users',compact('users'));
    }
}
