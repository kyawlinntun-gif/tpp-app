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
        $product = Product::find($id);
        return $product;
    }

    public function store($product)
    {
        $product = Product::create($product);

        return $product;
    }

    public function update($id, $data)
    {
        $product = $this->show($id);
        $product->update($data);
        $product = $this->show($id);
        return $product;
    }

    public function destroy($product)
    {
        $product->delete();
        return $product; 
    }
}