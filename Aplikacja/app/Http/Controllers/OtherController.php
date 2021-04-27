<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
        $users=User::with([
            'engaged'=>function($q){
                $q->where('status','selected');
                $q->with('details:rating,id');
            }])->get();

        $users->map(function($x){
            $x->avg=$x->engaged->avg('details.rating')??0;
            $x->jobs=$x->announcements()->count();
        });
        $users=$users->sortByDesc('avg')->values()->take(10);

        return view('ranking',compact('users'));
    }

    public function users(Request $request){
        $users=User::all();
        if($request->sort=='avg_rating'){
            $users=User::with([
                'engaged'=>function($q){
                    $q->where('status','selected');
                    $q->with('details:rating,id');
                }])->whereHas(
                    'engaged',function(Builder $q){$q->where('status','selected');}
                )->get();

            $users->map(function($x){
                $x->avg=$x->engaged->avg('details.rating');
            });
            $users=$users->sortBy('avg')->values();

        }
        return view('dashboard.users',compact('users'));
    }
}
