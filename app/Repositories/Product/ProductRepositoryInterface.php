<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface {
    public function index();
    public function show($id);
    public function store($product);
    public function update($id, $data);
    public function destroy($id);
}