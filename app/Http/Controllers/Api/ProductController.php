<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;

        $this->middleware('permission:productList', ['only' => ['index']]);
        $this->middleware('permission:productCreate', ['only' => ['store']]);
        $this->middleware('permission:productEdit', ['only' => ['show']]);
        $this->middleware('permission:productUpdate', ['only', ['update']]);
        $this->middleware('permission:productDelete', ['only', ['destroy']]);
    }

    public function index()
    {
        $data = $this->productRepository->index();

        $result = ProductResource::collection($data);

        return $this->sendResponse($result, 'Product Retrieved Successfully!', 200);
    }

    public function show($id)
    {
        $data = $this->productRepository->show($id);

        if(!$data) {
            return $this->sendError('Product Not Found!', null, 404);
        }

        $result = new ProductResource($data);

        return $this->sendResponse($result, 'Product Show Successfully!', 200);
    }

    public function store(ProductCreateRequest $request)
    {
        $productValidate = $request->validated();

        if($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->extension();

            $request->image->storeAs('productImages', $imageName);

            $productValidate = array_merge($productValidate, ['image' => $imageName]);
        }

        $product = $this->productRepository->store($productValidate);

        return $this->sendResponse($product, 'Product Created Successfully!', 201);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = $this->productRepository->show($id);

        if(!$product) {
            return $this->sendError('Product Not Found', null, 404);
        }

        $product = $this->productRepository->update($id, $request->all());

        return $this->sendResponse($product, 'Product Updated Successfully!', 200);
    }

    public function destroy($id)
    {
        $product = $this->productRepository->show($id);

        if(!$product) {
            return $this->sendError('Product Not Found', null, 404);
        }

        $product = $this->productRepository->destroy($product);
        return $this->sendResponse($product, 'Product Destroy Successfully!', 200);
    }
}
