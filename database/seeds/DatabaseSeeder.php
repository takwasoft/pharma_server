<?php

use App\MedicineType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(App\MedicineType::class, 50)->create();
        factory(App\Manufacturer::class, 50)->create();
    }
}
