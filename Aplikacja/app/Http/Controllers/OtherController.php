<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Categories;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    //
    public function dashboard(){
        $announcements = Announcement::latest()->where('status', 'active')->Orwhere('status', 'reported')->take(3)->get();
        $categories = Categories::inRandomOrder()->limit(3)->get();
        return view('welcome', ['announcements' => $announcements, 'categories' => $categories]);
    }
}
