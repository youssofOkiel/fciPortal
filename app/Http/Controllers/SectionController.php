<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $courses = Course::all();

        $instructors = User::where('user_id' , '=', 2)->get();

        return view('Admin.sections',[
            'sections' =>$sections,
            'courses' =>$courses,
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


        $course->save();

        return redirect()->back();

    }

//
//    public function UpdateCourse(Request $request, $id)
//    {
//        $course = Course::find($id);
//
//        $course->title = $request->title;
//        $course->code = $request->code;
//        $course->credit = $request->credit;
//        $course->level_id = $request->level;
//        $course->user_id = $request->instructor;
//
//        $course->save();
//
//        return redirect()->back();
//    }
//
//    public function deleteCourse($id)
//    {
//        $course = Course::find($id);
//        $course->delete();
//
//        return redirect()->back();
//    }
}
