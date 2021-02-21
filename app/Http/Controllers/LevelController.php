<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }


    public function index()
    {
        $levels = Level::all();

        return view('Admin.levels',[
            'levels' => $levels
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:7',
            'term' => 'required',
        ]);

        if ($validator->fails() ) {
            return back()->withErrors($validator);
        }


            $level = new Level();
            $level->title = $request->title;
            $level->term = $request->term;
            $level->save();
            return redirect()->back();

    }


    public function UpdateLevel(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:7',
            'term' => 'required',
        ]);

        if ($validator->fails() ) {
            return back()->withErrors($validator);
        }

        $level = Level::find($id);

           $level->title = $request->title;
           $level->term = $request->term;
           $level->save();

        return redirect()->back();
    }

    public function deleteLevel($id)
    {
        $level = Level::find($id);

        $level->courses()->delete();

        $level->delete();

        return redirect()->back();
    }
}
