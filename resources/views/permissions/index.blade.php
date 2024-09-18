@extends('layouts.master')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Permissions List</h1>
                @can('permissionCreate')
                    <a href="{{ route('permissions.create') }}" class="btn btn-outline-success">Create</a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-dark text-center">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white" scope="col">#ID</th>
                            <th class="bg-primary text-white" scope="col">NAME</th>
                            <th class="bg-primary text-white" scope="col">Role</th>
                            <th class="bg-primary text-white" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($permissions) > 0)
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ ucfirst($permission->id) }}</td>
                                    <td>{{ ucfirst($permission->name) }}</td>
                                    <td>
                                        @foreach ($permission->roles as $role)
                                            {{ ucfirst($role->name) }}@if(!($loop->last)){{ ', ' }}@endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            @can('permissionEdit')
                                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-outline-warning mr-2">Edit</a>
                                            @endcan
                                            @can('permissionDelete')    
                                                <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
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