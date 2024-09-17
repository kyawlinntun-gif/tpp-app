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

    public function store($product)
    {
        Product::create($product);
    }

    public function update($id, $data)
    {
        $product = $this->show($id);
        $product->update($data);
    }

    public function destroy($id)
    {
        $product = $this->show($id);
        $product->delete(); 
    }
}