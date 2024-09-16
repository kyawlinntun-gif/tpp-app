<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {
    public function index()
    {
        $products = Product::with('category')->get();
        return $products;
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }
}