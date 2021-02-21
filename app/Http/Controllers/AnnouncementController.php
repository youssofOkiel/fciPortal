<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Level;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        $levels = Level::all();

        return view('Admin.announcement', [
            'announcements' => $announcements,
            'levels' => $levels
        ]);
    }

    public function store(Request $request)
    {

        $announcement = new Announcement();

        $announcement->title = $request->title;
        $announcement->photo = $request->photo;
        $announcement->body = $request->body;
        $announcement->level_id = $request->level;

        if ($request->photo != null)
        {
            $image = $request->photo;

            $name = time() . '.' .$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $announcement->photo = $name ;

        }

        $announcement->save();

        return redirect()->back()   ;
    }

    public function UpdateAnnouncement(Request $request,$id)
    {
        $announcement = Announcement::find($id);


        $announcement->title = $request->title;
        $announcement->level_id = $request->level;
        $announcement->body = $request->body;


        if ($request->photo != Null)
        {
            $image = $request->photo;

            $image_path = public_path('images').'\\'.$announcement['photo'];
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $name = time() . '.' .$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $announcement->photo = $name ;
        }

        $announcement->save();

        return redirect()->back();
    }

/*    public function UpdatePhoto(Request $request,$id)
    {
        $announcement = Announcement::find($id);

        $image = $request->photo;

        if($announcement['photo'] != null )
        {
            $image_path = public_path('images') . '\\' . $announcement['photo'];
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $name = time() . '.' .$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $announcement->photo = $name ;


        $announcement->save();

        return redirect()->back();
    }*/

    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::find($id);

        $image_path = public_path('images') . '\\' . $announcement['photo'];
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $announcement->delete();

        return redirect()->back();
    }


}
