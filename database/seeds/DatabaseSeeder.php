<?php

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
        $this->call(HotelSeeder::class);
        // factory('App\RoomType', 5)->create();
        // factory('App\Room', 20)->create();
    }
}
