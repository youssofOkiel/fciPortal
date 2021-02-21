<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use App\Models\Majors;
use App\Models\Materials;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function Adminindex()
    {
        $courses = Course::all();
        $levels = Level::all();
        $majors = Majors::all();

        $instructors = User::where('role_id' , '=', 2)->get();

        return view('Admin.courses',[
            'courses' =>$courses,
            'levels' =>$levels,
            'majors' => $majors ,
            'instructors'=>$instructors
        ]);
    }

    public function  filter(Request $request)
    {

        $courses = Course::where('major_id', '=', $request->filter)->get();
        $levels = Level::all();
        $majors = Majors::all();

        $instructors = User::where('role_id' , '=', 2)->get();

        return view('Admin.courses',[
            'courses' => $courses,
            'levels' =>$levels,
            'majors' => $majors ,
            'instructors'=>$instructors
        ]);
    }


    public function store(Request $request)
    {
        $course = new Course();

        $course->title = $request->title;
        $course->code = $request->code;
        $course->credit = $request->credit;

        $course->level_id = $request->level;
        $course->user_id = $request->instructor;
        $course->major_id = $request->major;

        $course->save();

        return redirect()->back();

    }


    public function UpdateCourse(Request $request, $id)
    {
        $course = Course::find($id);

        $course->title = $request->title;
        $course->code = $request->code;
        $course->credit = $request->credit;
        $course->level_id = $request->level;
        $course->user_id = $request->instructor;

        $course->major_id = $request->major;

        $course->save();

        return redirect()->back();
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->back();
    }
}
