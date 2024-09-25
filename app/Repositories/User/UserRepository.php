<?php

namespace App\Repositories\User;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function store($user)
    {
        $role = Role::findOrFail($user['role_id']);
        $user = User::create($user);
        $user->assignRole($role->name);
        return $user;
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function update($id, $data)
    {
        $user = $this->show($id);
        $role = Role::findOrFail($data['role_id']);
        $user->update($data);
        $user->syncRoles($role);
        $user = $this->show($id);
        return $user;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return $user;
    }
}