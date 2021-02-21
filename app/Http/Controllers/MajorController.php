<?php

namespace App\Http\Controllers;

use App\Models\Majors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }

    public function index()
    {
        $majors = Majors::all();

        return view('Admin.majors',[
            'majors' => $majors
        ]);
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
            'description' => 'required',
        ]);

        if ($validator->fails() ) {
            return back()->withErrors($validator);
        }

        $major = new Majors();
        $major->title = $request->title;
        $major->description = $request->description;

        $major->save();

        return redirect()->back();

    }


    public function UpdateMajor(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:2',
            'description' => 'required',
        ]);

        if ($validator->fails() ) {
            return back()->withErrors($validator);
        }

        $major = Majors::find($id);

        $major->title = $request->title;
        $major->description = $request->description;
        $major->save();

        return redirect()->back();
    }

    public function deleteMajor($id)
    {
        $major = Majors::find($id);

//        $major->courses()->delete();

        $major->delete();

        return redirect()->back();
    }
}
