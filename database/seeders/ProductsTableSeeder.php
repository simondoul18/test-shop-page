<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'vendor_id' => 1,
                'sku' => 'MS46891340',
                'title' => '3D Television',
                'image' => '1.jpg',
                'description' => 'd askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak.',
                'attributes' => NULL,
                'color' => 'Black',
                'rating' => 5,
                'isDynamicPrice' => 0,
                'price' => 40,
                'category_id' => 1,
                'tax_ids' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'vendor_id' => 1,
                'sku' => 'MS46891341',
                'title' => 'Apple Laptop',
                'image' => '3.jpg',
                'description' => 'd askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak.',
                'attributes' => NULL,
                'color' => 'Silver',
                'rating' => 3,
                'isDynamicPrice' => 0,
                'price' => 1000,
                'category_id' => 1,
                'tax_ids' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'vendor_id' => 2,
                'sku' => 'MS46891340',
                'title' => 'Original irani Fabric pure irani Zari walvit',
                'image' => 'qaleen.jpg',
                'description' => 'd askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak d askd ksak.',
                'attributes' => NULL,
                'color' => 'Red',
                'rating' => 4,
                'isDynamicPrice' => 1,
                'price' => 2,
                'category_id' => 2,
                'tax_ids' => NULL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
