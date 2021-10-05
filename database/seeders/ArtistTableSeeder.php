<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert(
            [   'name'=>"アーティストアカウント",
                'user_id'=>"1",
                'email'=>"artist@artist.com",
                'password'=>Hash::make("password"),
                'phone' =>"08000000000"
            ]);
        DB::table('artists')->insert(
            [   'name'=>"アーティストアカウント2",
                 'user_id'=>"2",
                'email'=>"artist2@artist2.com",
                'password'=>Hash::make("password"),
                'phone' =>"08000000002"
            ]);
        DB::table('artists')->insert(
            [   'name'=>"アーティストアカウント3",
                'user_id'=>"3",
                'email'=>"artist3@artist3.com",
                'password'=>Hash::make("password"),
                'phone' =>"08000000003"
            ]);
    }
}