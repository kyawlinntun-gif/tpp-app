@extends('layouts.master')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Roles List</h1>
                @can('roleCreate')
                    <a href="{{ route('roles.create') }}" class="btn btn-outline-success">Create</a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-dark text-center">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white" scope="col">#ID</th>
                            <th class="bg-primary text-white" scope="col">NAME</th>
                            <th class="bg-primary text-white" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ ucfirst($role->id) }}</td>
                                    <td>{{ ucfirst($role->name) }}</td>
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
    function deleteUser(id)
    {
        if(confirm("Are you sure you want to delete this user?"))
        {
            document.getElementById(`deleteUser${id}`).submit();
        }
    }

</script>

@endsection