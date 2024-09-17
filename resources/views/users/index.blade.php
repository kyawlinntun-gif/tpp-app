@extends('layouts.master')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1>Users List</h1>
                @can('userCreate')
                    <a href="{{ route('users.create') }}" class="btn btn-outline-success">Create</a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-dark text-center">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white" scope="col">#ID</th>
                            <th class="bg-primary text-white" scope="col">NAME</th>
                            <th class="bg-primary text-white" scope="col">EMAIL</th>
                            <th class="bg-primary text-white" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @can('userEdit')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-warning">Edit</a>
                                        @endcan
                                        @can('userDelete')    
                                            <button class="btn btn-outline-danger" onclick="event.preventDefault();deleteUser({{ $user->id }});">Delete</button>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post" id="deleteUser{{ $user->id }}" hidden>
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endcan
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
    function deleteUser(id)
    {
        if(confirm("Are you sure you want to delete this user?"))
        {
            document.getElementById(`deleteUser${id}`).submit();
        }
    }

</script>

@endsection