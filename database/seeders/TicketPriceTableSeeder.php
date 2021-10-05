<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TicketPrice')->insert(
            [   'ticket'=>2,
                'money'=>200,
            ]);
        DB::table('TicketPrice')->insert(
            [   'ticket'=>5,
                'money'=>500,
            ]);
        DB::table('TicketPrice')->insert(
            [   'ticket'=>7,
                'money'=>700,
            ]);
        DB::table('TicketPrice')->insert(
            [   'ticket'=>10,
                'money'=>900,
            ]);
    }
}
