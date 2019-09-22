<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert ([
            ['label'=> 'Asian Test'],
            ['label'=> 'Digital Unicorn'],
            ['label'=> 'mgm'],
            ['label'=> 'HT Active'],
            ['label'=> 'Framgia'],
            ['label'=> 'Sea Dev'],
            ['label'=> 'Logigear']
        ]);
    }
}
