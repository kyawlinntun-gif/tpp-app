@extends('layouts.master')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Role Create</h1>
                <a href="{{ route('roles.index') }}" class="btn btn-outline-success">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="permission_id">Permission:</label>
                        <div>
                            @foreach ($permissions as $permission)
                                <input type="checkbox" name="permission_id[]" id="permission_id" class="mr-2" value="{{ $permission->id }}">{{ ucfirst($permission->name) }} <br/>
                            @endforeach
                        </div>
                        @error('permission_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection