<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dish_types')->insert ([
            ['label'=> 'Drinks'],
            ['label'=> 'Meals'],
            ['label'=> 'Dessert'],
            ['label'=> 'Appetizer']          
        ]);
    }
}
