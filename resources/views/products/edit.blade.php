@extends('layouts.master')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Product Update</h1>
                <a href="{{ route('products.index') }}" class="btn btn-outline-success">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product['name'] }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" rows="5" class="form-control">{{ $product['description'] }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ $product['price'] }}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="image">Image: </label>
                        <img src="{{ asset('productImages/' . $product['image']) }}" alt="{{ $product['image'] }}" style="width: 100px; height: 100px; display: block;">
                    </div>
                    <div class="form-group mt-2">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $product['status'] ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $product['status'] ? '' : 'selected' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="category">Category:</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product['category']['id'] === $category['id'] ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection