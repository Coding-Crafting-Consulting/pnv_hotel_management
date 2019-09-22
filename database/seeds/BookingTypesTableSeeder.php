<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_types')->insert ([
          ['label'=> 'Online', 'online_plateform_id' => 1],
          ['label'=> 'Online', 'online_plateform_id' => 2],
          ['label'=> 'Online', 'online_plateform_id' => 3],
          ['label'=> 'Online', 'online_plateform_id' => 4],
          ['label'=> 'Online', 'online_plateform_id' => 5],
          ['label'=> 'Online', 'online_plateform_id' => 6],
          ['label'=> 'Website', 'online_plateform_id' => null],
          ['label'=> 'Phone call', 'online_plateform_id' => null],
          ['label'=> 'Email', 'online_plateform_id' => null],
          ['label'=> 'Directly coming', 'online_plateform_id' => null]
        ]);
    }
}
