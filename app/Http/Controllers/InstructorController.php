<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use App\Models\Majors;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function __construct()
    {
                $this->middleware('auth');
        //        $this->middleware('admin');
                $this->middleware('instructor');

    }

    public function index()
    {
        $courses = Course::where('user_id','=', Auth::user()->id )->get();

        return view('Instructor.dashboard',[
            'courses' => $courses
        ]);
    }

//    public function  Instfilter(Request $request)
//    {
//
//        $courses = Course::where('level_id', '=', $request->filter)->get();
//
//
//        return view('Instructor.dashboard',[
//            'courses' => $courses
//
//        ]);
//    }

}
