<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $data = $this->categoryRepository->index();

        return $this->sendResponse($data, "Category Retrieved Successfully!", 200);
    }

    public function show($id)
    {
        $data = $this->categoryRepository->show($id);
        if(!$data) {
            return $this->sendError('Category Not Found!', null, 404);
        }

        return $this->sendResponse($data, 'Category Show Successfully!', 200);
    }

    public function store(CategoryCreateRequest $request)
    {
        $category = $this->categoryRepository->store($request->name);

        return $this->sendResponse($category, 'Category Created Successfully!', 201);
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $this->categoryRepository->show($id);

        if(!$category) {
            return $this->sendError('Category Not Found!', null, 404);
        }

        $category = $this->categoryRepository->update($id, $request->name);

        return $this->sendResponse($category, 'Category Updated Successfully!', 200);
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->show($id);

        if(!$category) {
            return $this->sendError('Category Not Found', null, 404);
        }

        $category = $this->categoryRepository->destroy($category);

        return $this->sendResponse($category, 'Category Destroy Successfully!', 200);
    }
}
