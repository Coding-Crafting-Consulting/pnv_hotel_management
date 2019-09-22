<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BookingPurposesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(DishTypesTableSeeder::class);
        $this->call(EquipmentsTableSeeder::class);
        $this->call(IdentificationTypesTableSeeder::class);
        $this->call(OnlinePlateformsTableSeeder::class);
        $this->call(BookingTypesTableSeeder::class);
        $this->call(RoomSizesTableSeeder::class);
        $this->call(TitlesTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
