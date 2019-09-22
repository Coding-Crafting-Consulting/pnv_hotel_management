<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment')->insert ([
            ['label'=> 'Air Conditioner'],
            ['label'=> 'Wifi'],
            ['label'=> 'Karaoke'],
            ['label'=> 'Tivi'],
            ['label'=> 'Telephone'],
            ['label'=> 'Liter Kettel'],
                      
        ]);
    }
}
