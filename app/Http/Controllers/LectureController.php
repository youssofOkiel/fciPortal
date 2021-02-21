<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\Materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{



    public function Adminindex($id)
    {
        $course = Course::find($id);

        $lectures = Lecture::where('course_id' , '=', $id)->get();

        return view('Admin.lectures',[
            'lectures' => $lectures,
            'course' => $course
        ]);
    }

    public function index($id)
    {
        $lectures = Lecture::where('course_id' , '=', $id)->get();

        return view('Instructor.lectures',[
            'lectures' => $lectures,
             'Course_id' => $id
        ]);
    }

    public function store(Request $request, $Course_id)
    {
        $lecture = new Lecture();

        $lecture->title = $request->title;
        $lecture->VideosUrls = $request->video;

        $lecture->course_id = $Course_id;
        $lecture->user_id = Auth::user()->id;

        $lecture->save();

        if ($request->material != null)
        {

            $file =$request->material;
            $name = time() . '.' .$file->getClientOriginalExtension();
            $destinationPath = public_path('/CoursesMaterials');
            $file->move($destinationPath, $name);

            $material = new Materials(
                [
                    'title' => $request->title,
                    'path' => $name
                ]
            );

           $lecture->materials()->save($material);
        }



        return redirect()->back();

    }



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
