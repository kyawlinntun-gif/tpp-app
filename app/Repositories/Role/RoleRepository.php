<?php

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface {
    public function index()
    {
        $roles = Role::all();
        return $roles;
    }

    public function store($role)
    {
        Role::create($role);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return $role;
    }

    public function update($id, $data)
    {
        $role = Role::findOrFail($id);
        $role->update($data);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }
}