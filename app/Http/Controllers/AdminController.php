<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function __construct()
    {
                $this->middleware('auth');
                $this->middleware('admin');
    }


    public function UsersIndex()
    {
        $users = User::all();

        return view('Admin.users',[
            'users' => $users
        ]);
    }

    public function index()
    {
        $users = User::all();

        return view('Admin.admin',[
            'users' => $users
        ]);
    }

    public function createEmployee()
    {
        return view('auth.empRegister');
    }

    protected function addEmployee (Request $request)
    {

        $employee = new User();

        $employee->name = $request['name'];
        $employee->ssd = $request['SSD'];
        $employee->email = $request['email'];
        $employee->role_id = $request['type'];

        $employee->photo = 'avatar.png';
        $employee->password = Hash::make($request['password']);

        $employee->save();

        return redirect()->back();
    }

    protected function  createUsers(Request  $request)
    {

           $rows =  Excel::import(new UsersImport, $request->csvFile->store('temp'));

            return back()->with(['ok' => 'file readed']);


    }

    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }


    public function UpdateRole(Request $request, $id)
    {
        $user = User::find($id);
        $user->role_id = $request->role;
        $user->save();

        return back();
    }

    public function deleteUser($id)
    {
      $user = User::find($id);
      $user->delete();

      return redirect()->back();
    }

    public function  filter(Request $request)
    {

        $users = User::where('role_id', '=', $request->filter)->get();


        return view('Admin.users',[
            'users' => $users
        ]);
    }


//    public function store(Request $request)
//    {
////        $this->validate($request, [
////            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
////        ]);
//        $doc = new doctor();
//
//        $doc->name = $request->DocName;
//        $doc->phone = $request->phone;
//        $doc->type = $request->doctors;
//
//        if ($request->photo != null)
//        {
//            $image = $request->photo;
//
//            $name = time() . '.' .$image->getClientOriginalExtension();
//            $destinationPath = public_path('/images');
//            $image->move($destinationPath, $name);
//            $doc->photo = $name ;
//
//        }else{
//            $doc->photo = 'avatar.png';
//        }
//
//        $doc->save();
//
//        return redirect()->back()   ;
//    }
//

//    public function update(Request $request,$id)
//    {
//        $doc = doctor::find($id);
//
//        if ($request->DocName != Null)
//        {
//            $doc->name = $request->DocName;
//
//        }
//        if ( $request->phone != Null)
//        {
//            $doc->phone = $request->phone;
//
//        }
//        if ($request->type != Null)
//        {
//            $doc->type = $request->type;
//
//        }
//
//        if ($request->photo != Null)
//        {
//            $image = $request->photo;
//
//            $image_path = public_path('images').'\\'.$doc['Photo'];
//            if(File::exists($image_path)) {
//                File::delete($image_path);
//            }
//
//            $name = time() . '.' .$image->getClientOriginalExtension();
//            $destinationPath = public_path('/images');
//            $image->move($destinationPath, $name);
//            $doc->Photo = $name ;
//        }
//
//        $doc->save();
//
//        return redirect()->back();
//    }
//
//    public function delete($id)
//    {
//        $doc = doctor::find($id);
//
//        $image_path = public_path('images').'\\'.$doc['Photo'];  // Value is not URL but directory file path
//
////        dd($doc, $image_path);
//
//        if(File::exists($image_path)) {
//            File::delete($image_path);
//        }
//        $doc->delete();
//
//        return redirect()->back();
//    }
}
