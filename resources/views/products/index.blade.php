@extends('layouts.master')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Products List</h1>
                @can('productCreate')
                    <a href="{{ route('products.create') }}" class="btn btn-outline-success">Create</a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-dark text-center">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white" scope="col">#ID</th>
                            <th class="bg-primary text-white" scope="col">NAME</th>
                            <th class="bg-primary text-white" scope="col">DESCRIPTION</th>
                            <th class="bg-primary text-white" scope="col">PRICE</th>
                            <th class="bg-primary text-white" scope="col">STATUS</th>
                            <th class="bg-primary text-white" scope="col">IMAGE</th>
                            <th class="bg-primary text-white" scope="col">CATEGORY</th>
                            <th class="bg-primary text-white" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product['id'] }}</td>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['description'] }}</td>
                                <td>{{ $product['price'] }}</td>
                                <td>{{ $product['status'] ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <img src="{{ asset('productImages/' . $product['image']) }}"
                                        alt="{{ $product['image'] }}" style="width: 70px; height: 70px;">
                                </td>
                                <td>{{ $product['category']['name'] ?? 'Undefined' }}</td>
                                <td>
                                    <div class="d-flex">
                                        @can('productEdit')    
                                            <a href="{{ route('products.edit', $product['id']) }}"
                                                class="btn btn-outline-warning mr-2">Edit</a>
                                        @endcan
                                        @can('productDelete')    
                                            <button class="btn btn-outline-danger" onclick="
                                                    event.preventDefault();
                                                    confirmDeleteProduct({{ $product['id'] }});
                                                    ">Delete</button>
                                            <form action="{{ route('products.destroy', $product['id']) }}" method="post"
                                                id="deleteProduct{{ $product['id'] }}" hidden>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    function confirmDeleteProduct(id) {
        if(confirm("Are you sure you want to delete this product?")) {
            document.getElementById(`deleteProduct${id}`).submit();
        }
    }
</script>

@endsection