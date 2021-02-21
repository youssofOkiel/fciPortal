<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        $levels = Level::all();

        return view('Admin.schedule', [
            'schedules' => $schedules,
            'levels' => $levels
        ]);
    }

    public function store(Request $request)
    {

        $schedule = new Schedule();

        $schedule->photo = $request->schedule;
        $schedule->description = $request->description;
        $schedule->level_id = $request->level;

        if ($request->schedule != null)
        {
            $image = $request->schedule;

            $name = time() . '.' .$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $schedule->photo = $name ;

        }

        $schedule->save();

        return redirect()->back()   ;
    }

    public function UpdateSchedule(Request $request,$id)
    {
        $schedule = Schedule::find($id);


        $schedule->description = $request->description;
        $schedule->level_id =$request->level;


        if ($request->schedule != Null)
        {
            $image = $request->schedule;

            $image_path = public_path('images').'\\'.$schedule['photo'];
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $name = time() . '.' .$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $schedule->photo = $name ;
        }

        $schedule->save();

        return redirect()->back();
    }

    public function deleteSchedule($id)
    {
        $schedule = Schedule::find($id);

        $image_path = public_path('images').'\\'.$schedule['photo'];  // Value is not URL but directory file path

//        dd($schedule , $schedule['photo']  , $image_path);

        if(File::exists($image_path)) {
            File::delete($image_path);
        }

        $schedule->delete();

        return redirect()->back();
    }

}
