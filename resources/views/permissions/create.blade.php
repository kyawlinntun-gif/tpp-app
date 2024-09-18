@extends('layouts.master')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Permission Create</h1>
                <a href="{{ route('permissions.index') }}" class="btn btn-outline-success">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="role_id">Role</label>
                        <div>
                            @foreach ($roles as $role)
                                <input type="checkbox" name="role_id[]" id="role_id" class="mr-2" value="{{ $role->id }}">{{ ucfirst($role->name) }} <br/>
                            @endforeach
                        </div>
                        @error('role_id')
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