<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [   'name'=>"太郎",
                'email'=>"user@user.com",
                'phone'=>"08011112222",
                'password'=>Hash::make("password")
            ]);
        DB::table('users')->insert(
            [   'name'=>"じじ",
                'email'=>"user2@user2.com",
                'phone'=>"08022223333",
                'password'=>Hash::make("password")
            ]);
        DB::table('users')->insert(
            [   'name'=>"ばば",
                'email'=>"user3@user3.com",
                'phone'=>"08033334444",
                'password'=>Hash::make("password")
            ]);
    }
}
