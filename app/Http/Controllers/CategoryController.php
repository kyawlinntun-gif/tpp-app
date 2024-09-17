<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepository->index();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = $this->categoryRepository->store($request->name);

        if($request->hasFile('images')) {
            foreach($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();

                $image->storeAs('categoryImages', $imageName);

                $category->categoryAttachments()->create([
                    'image' => $imageName
                ]);
            }
        }

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->show($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->categoryRepository->update($id, $request->name);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);
        
        return redirect()->route('categories.index');
    }
}
