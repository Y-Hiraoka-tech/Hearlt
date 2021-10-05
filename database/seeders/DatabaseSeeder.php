<?php

namespace Database\Seeders;

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
        //\App\Models\User::factory(10)->create();
        $this->call(AdminTableSeeder::class);
        $this->call(ArtistTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(FollowingsTableSeeder::class);
        $this->call(UserToArtistsTableSeeder::class);
        $this->call(TicketPriceTableSeeder::class);    
    }
}
