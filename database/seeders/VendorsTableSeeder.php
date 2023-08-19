<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vendors')->insert([
            ['id' => 1, 'user_id' => null, 'business_name' => 'Global Electronics', 'address' => '', 'phone' => '', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'user_id' => null, 'business_name' => 'Sephire', 'address' => '', 'phone' => '', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
