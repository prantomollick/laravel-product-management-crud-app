<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 1', 
                'description' => 'This is a sample description for product 1.',
                'price' => 10.99, 
                'stock' => 100, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 2', 
                'description' => 'This is a sample description for product 2.',
                'price' => 20.99, 
                'stock' => 200, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 3', 
                'description' => 'This is a sample description for product 3.',
                'price' => 30.99, 
                'stock' => 300, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 4', 
                'description' => 'This is a sample description for product 4.',
                'price' => 40.99, 
                'stock' => 400, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 5', 
                'description' => 'This is a sample description for product 5.',
                'price' => 50.99, 
                'stock' => 500, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ],

            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 6', 
                'description' => 'This is a sample description for product 6.',
                'price' => 60.99, 
                'stock' => 600, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ],

            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 7', 
                'description' => 'This is a sample description for product 7.',
                'price' => 70.99, 
                'stock' => 700, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ],

            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 8', 
                'description' => 'This is a sample description for product 8.',
                'price' => 80.99, 
                'stock' => 800, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ],

            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 9', 
                'description' => 'This is a sample description for product 9.',
                'price' => 90.99, 
                'stock' => 900, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ],

            [
                'product_id' => Str::random(10), 
                'name' => 'Sample Product 10', 
                'description' => 'This is a sample description for product 10.',
                'price' => 100.99, 
                'stock' => 1000, 
                'image' => 'https://placehold.co/128x98', 
                'created_at' => now(), 
                'updated_at' => now()
            ]

        ]);

    }
}
