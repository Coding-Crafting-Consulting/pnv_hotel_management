<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('room_sizes')->insert ([
            ['label'=> 'Double'],
            ['label'=> 'Single'],
            ['label'=> 'Triple'],
            ['label'=> 'Quad'],
            ['label'=> 'Queen'],
            ['label'=> 'King']
        ]);
    }
}
