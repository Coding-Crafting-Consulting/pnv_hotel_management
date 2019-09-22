<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OnlinePlateformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('online_plateforms')->insert ([
          ['label'=> 'booking.com'],
          ['label'=> 'tripadvisor.com'],
          ['label'=> 'agoda.com'],
          ['label'=> 'tourist.com'],
          ['label'=> 'tuanweb.com'],
          ['label'=> 'cookpad.com']
        ]);
    }
}
