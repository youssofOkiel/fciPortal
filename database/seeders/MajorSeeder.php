<?php

namespace Database\Seeders;

use App\Models\Majors;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Majors::factory()
            ->create();
    }
}
