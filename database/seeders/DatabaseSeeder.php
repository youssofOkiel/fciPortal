<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert([
            'title' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'title' => 'Instructor',
        ]);
        DB::table('roles')->insert([
            'title' => 'Student',
        ]);
        DB::table('roles')->insert([
            'title' => 'Employee',
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'ssd' => 12345678912345,
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('Admin@123'),
            'init_password' => Hash::make('Admin@123') ,
            'role_id' => 1,
        ]);

        DB::table('levels')->insert([
            'title' => 'Level 1',
            'term' => 'term one'
        ]);
        DB::table('levels')->insert([
            'title' => 'Level 1',
            'term' => 'term two'
        ]);
        DB::table('levels')->insert([
            'title' => 'Level 2',
            'term' => 'term one'
        ]);
        DB::table('levels')->insert([
            'title' => 'Level 2',
            'term' => 'term two'
        ]);
        DB::table('levels')->insert([
            'title' => 'Level 3',
            'term' => 'term one'
        ]);
        DB::table('levels')->insert([
            'title' => 'Level 3',
            'term' => 'term two'
        ]);
        DB::table('levels')->insert([
            'title' => 'Level 4',
            'term' => 'term one'
        ]);
        DB::table('levels')->insert([
            'title' => 'Level 4',
            'term' => 'term two'
        ]);



        DB::table('majors')->insert([
            'title' => 'CS',
            'description' => 'bla bla bla'
        ]);

        DB::table('majors')->insert([
            'title' => 'IT',
            'description' => 'bla bla bla'
        ]);

        DB::table('majors')->insert([
            'title' => 'MM',
            'description' => 'bla bla bla'
        ]);

    }


}
