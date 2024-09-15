<?php

namespace App\Repositories\Product;

interface ProductRepositoryInterface {
    public function index();
    public function show($id);
}