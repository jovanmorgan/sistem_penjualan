<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarketingSeeder extends Seeder
{
    public function run()
    {
        DB::table('marketing')->insert([
            ['id' => 1, 'name' => 'Alfandy'],
            ['id' => 2, 'name' => 'Mery'],
            ['id' => 3, 'name' => 'Danang'],
        ]);
    }
}
