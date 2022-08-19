<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant_tables')->insert([
            'name' => '1',
        ]);
        DB::table('restaurant_tables')->insert([
            'name' => '2',
        ]);
        DB::table('restaurant_tables')->insert([
            'name' => '3',
        ]);
        DB::table('restaurant_tables')->insert([
            'name' => '4',
        ]);
        DB::table('restaurant_tables')->insert([
            'name' => '5',  
        ]);
    }
}
