<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'title' => 'Electronics', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'title' => 'Clothing', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
