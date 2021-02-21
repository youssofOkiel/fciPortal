<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $pass = substr( $row[1],6 );

        return new \App\Models\User([
            'name' => $row[0],
            'ssd'  => $row[1],
            'gpa'  => $row[2] ,
            'credit' => $row[3],
            'email'  => $row[0]. substr($row[1],10) .'@fci.luxor.edu.eg',
            'role_id' => 3,

            'password' => Hash::make( $pass ),
            'init_password' => $pass,

        ]);

    }
}
