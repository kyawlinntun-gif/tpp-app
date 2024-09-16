@extends('layouts.master')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Categories List</h1>
                <a href="{{ route('categories.create') }}" class="btn btn-outline-success">Create</a>
            </div>
            <div class="card-body">
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white" scope="col">#ID</th>
                            <th class="bg-primary text-white" scope="col">NAME</th>
                            <th class="bg-primary text-white" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category['id'] }}</td>
                            <td>{{ $category['name'] }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('categories.edit', ['id' => $category['id']]) }}"
                                    class="btn btn-outline-warning mr-2">Edit</a>
                                <form action="{{ route('categories.destroy', $category['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection