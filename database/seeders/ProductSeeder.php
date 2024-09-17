<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Product 1', 'description' => 'Description for Product 1', 'price' => 100, 'category_id' => 1],
            ['name' => 'Product 2', 'description' => 'Description for Product 2', 'price' => 200, 'category_id' => 1],
            ['name' => 'Product 3', 'description' => 'Description for Product 3', 'price' => 300, 'category_id' => 1],
            ['name' => 'Product 4', 'description' => 'Description for Product 4', 'price' => 400, 'category_id' => 1],
            ['name' => 'Product 5', 'description' => 'Description for Product 5', 'price' => 500, 'category_id' => 1],
            ['name' => 'Product 6', 'description' => 'Description for Product 6', 'price' => 600, 'category_id' => 1],
            ['name' => 'Product 7', 'description' => 'Description for Product 7', 'price' => 700, 'category_id' => 1],
            ['name' => 'Product 8', 'description' => 'Description for Product 8', 'price' => 800, 'category_id' => 1],
            ['name' => 'Product 9', 'description' => 'Description for Product 9', 'price' => 900, 'category_id' => 1],
            ['name' => 'Product 10', 'description' => 'Description for Product 10', 'price' => 1000, 'category_id' => 1],
        ];

        foreach($products as $product)
        {
            Product::create($product);
        }
    }
}
