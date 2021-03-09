<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Auth::user()->announcements;
        $announcements=Auth::user()->announcements;
        foreach($announcements as $key=>$announcement){
            $images= collect(Storage::disk('uploads')->allFiles($announcement->id))
            ->sortByDesc(function ($file) {return Storage::disk('uploads')->lastModified($file);});
            if(count($images)>0){
                $announcements[$key]->main_image='/uploads/'.$images[0];
            }else{
                $announcements[$key]->main_image='/uploads/placeholder.jpg';
            }
        }
        return view('dashboard.my_announcements',['announcements'=>$announcements]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.add_announcement',['categories'=>Categories::all()]);
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'title'=>'required|max:255',
            'localization'=>'required',
            'price'=>"numeric|min:1|required",
            "description"=>"required|max:500",
            "expiring_at"=>"required|date",
            "category_id"=>"required|exists:categories,id"
        ]);
        // return $data;
        $data['creator_id']=Auth::id();
        $announcement=Announcement::create($data);
        for($i=1;$i<4;$i++){
            if($request->hasFile('img'.$i)){
                $request->file('img'.$i)->store($announcement->id,'uploads');
            }
        }
        return back()->with('status',"Pomyślnie dodano nowe ogłoszenie");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
        if($announcement->creator_id!=Auth::id()){
            return redirect('/dashboard/announcement');
        }
        return $announcement;
        return view('dashboard.edit_announcement',['announcement'=>$announcement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
