<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Categories;
use App\Models\Has_Category;
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
        $announcements = Auth::user()->announcements->reverse();
        // $announcements=array_reverse($announcements);
        foreach ($announcements as $key => $announcement) {
            if ($announcement->img1 == Null) {
                $announcements[$key]->img1 = 'placeholder.jpg';
            }
            if (strlen($announcement->description) > 150) {
                $announcements[$key]->description = substr($announcement->description, 0, 150) . "...";
            }
        }
        return view('dashboard.my_announcements', ['announcements' => $announcements]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.add_announcement', ['categories' => Categories::all()]);
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
        // return $request->file('img1');
        $request->validate(['img1' => 'nullable|image|dimensions:max_width=2000,max_height=2000', 'img2' => 'nullable|image|dimensions:max_width=2000,max_height=2000', 'img3' => 'nullable|image|dimensions:max_width=2000,max_height=2000']);
        $data = $request->validate([
            'title' => 'required|max:255',
            'localization' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'price' => "numeric|min:1|required",
            "description" => "required|max:502",
            "expiring_at" => "required|date|after:today",
            "categories" => "required"
        ]);
        $categories = explode(",", $data['categories']);
        unset($data['categories']);
        $data['creator_id'] = Auth::id();
        $announcement = Announcement::create($data);
        foreach ($categories as $categoty) {
            Has_Category::create(['category_id' => $categoty, 'announcement_id' => $announcement->id]);
        }
        $x = 1;
        for ($i = 1; $i < 4; $i++) {
            // return $request->hasFile($key);
            if ($request->hasFile('img' . $i)) {
                $key = 'img' . $x;
                $x++;
                $path = $request->file('img' . $i)->store($announcement->id, 'uploads');
                // return [$key=>$path];
                $announcement->update([$key => $path]);
            }
        }
        return redirect()->route('announcement.index')->with('status', "Pomyślnie dodano nowe ogłoszenie");
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
        // return $announcement->categories()->get();
        if ($announcement->creator_id != Auth::id()) {
            return redirect('/dashboard/announcement');
        }
        return view('dashboard.edit_announcement', ['announcement' => $announcement, 'categories' => Categories::all()]);
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
        if($announcement->status!="active"){
            return back()->withErrors(["Edytować można tylko aktywne oferty"]);
        }
        $request->validate(['img1' => 'nullable|image|dimensions:max_width=2000,max_height=2000', 'img2' => 'nullable|image|dimensions:max_width=2000,max_height=2000', 'img3' => 'nullable|image|dimensions:max_width=2000,max_height=2000']);
        $data = $request->validate([
            'title' => 'required|max:255',
            'localization' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'price' => "numeric|min:1|required",
            "description" => "required|max:502",
            "expiring_at" => "required|date",
            "categories" => "required",
        ]);
        if (isset($request->status)) {
            if ($request->status == 'finished') {
                $data['status'] = 'finished';
            }
        }
        $categories = explode(",", $data['categories']);
        unset($data['categories']);
        $announcement->update($data);
        Has_Category::where('announcement_id', $announcement->id)->delete();
        foreach ($categories as $categoty) {
            Has_Category::create(['category_id' => $categoty, 'announcement_id' => $announcement->id]);
        }
        for ($i = 1; $i < 4; $i++) {
            if ($request->hasFile('img' . $i)) {
                $path = $request->file('img' . $i)->store($announcement->id, 'uploads');
                if ($announcement->img1 == null) {
                    $announcement->update(['img1' => $path]);
                } elseif ($announcement->img2 == null) {
                    $announcement->update(['img2' => $path]);
                } else {
                    $announcement->update(['img' . $i => $path]);
                }
            }
        }
        if (isset($data['status'])) {
            return redirect()->route('announcement.index')->with('status', 'Pomyślnie zakończono ogłoszenie');
        }
        return back()->with('status', 'Pomyślnie zaktualizowano dane');
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement, Request $request)
    {
        if (Auth::id() != $announcement->creator_id || $request->id > 3 || $request->id < 1)
            return redirect('/dashboard/announcement');

        $image = $announcement['img' . $request->id];
        if ($image != NULL) {
            $announcement->update(['img' . $request->id => Null]);
            Storage::disk('uploads')->delete($image);
            if ($announcement->img1 == Null) {
                if ($announcement->img2 != null) {
                    $announcement->update(['img1' => $announcement->img2]);
                    $announcement->update(['img2' => Null]);
                } elseif ($announcement->img3 != null) {
                    $announcement->update(['img1' => $announcement->img3]);
                    $announcement->update(['img3' => Null]);
                }
            }
            if ($announcement->img2 == Null) {
                if ($announcement->img3 != null) {
                    $announcement->update(['img2' => $announcement->img3]);
                    $announcement->update(['img3' => Null]);
                }
            }
            return back()->with('status', 'Pomyślnie usunięto zdjęcie');
        }
        return back();

        //
    }

    public function Api(Request $request)
    {
        $querry = Announcement::where('status',"LIKE", 'active');
        if ($request->title) $querry->where('title', 'LIKE', '%' . $request->title . '%');
        if ($request->price_min) $querry->where('price', '>', $request->price_min);
        if ($request->price_max) $querry->where('price', '<', $request->price_max);




        // if($request->categories){
        //     $querry->whereHas('categories',function($q) use ($request){  $q->whereIn('categories.name', $request->categories);});
        // }
        $offers = $querry->with('categories')->get();
        if ($request->categories) {
            $categories_prim = Categories::whereNotIn('name', $request->categories)->get();
            foreach ($offers as $key => $offer) {
                foreach ($categories_prim as $category) {
                    if (in_array($category->name, $offer->categories->pluck('name')->toArray())) {
                        unset($offers[$key]);
                        continue;
                    }
                }
            };
        }
        return $offers;
    }
}
