<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {
    public function index()
    {
        $categories = Category::with('categoryAttachments')->get();
        return $categories;
    }

    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        return $category;
    }

    public function store($name)
    {
        $category = Category::create([
            'name' => $name
        ]);

        return $category;
    }

    public function update($id, $name)
    {
        $category = $this->show($id);
        $category->update([
            'name' => $name
        ]);
        $category = $this->show($id);
        return $category;
    }

    public function destroy($category)
    {
        $category->delete();
        return $category;
    }
}