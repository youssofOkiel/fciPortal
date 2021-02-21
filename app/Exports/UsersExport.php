<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = DB::table('users')->select('name', 'ssd' ,'gpa', 'credit', 'email', 'init_password' )
            ->where('role_id', '=', 3)
            ->get();


        return $students;
    }
}
