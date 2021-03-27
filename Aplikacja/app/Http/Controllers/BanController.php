<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class BanController extends Controller
{
    //
    public function report_announcement(Announcement $announcement){
        $announcement->update(['status'=>'reported']);
        return redirect('/')->with('status','Pomyślnie zgłoszono ogłoszenie');
    }
}
