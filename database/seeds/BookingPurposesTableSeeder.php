<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingPurposesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('booking_purposes')->insert ([
            ['label'=> 'Tourism'],
            ['label'=> 'Business']
        ]);
    }
}
