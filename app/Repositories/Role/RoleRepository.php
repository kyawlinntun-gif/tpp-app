<?php

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;
use App\Repositories\Role\RoleRepositoryInterface;
use Spatie\Permission\Models\Permission;

class RoleRepository implements RoleRepositoryInterface {
    public function index()
    {
        $roles = Role::all();
        return $roles;
    }

    public function store($data)
    {
        $role = Role::create($data);
        $role->permissions()->sync($data['permission_id']);
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
        $role->permissions()->sync($data['permission_id']);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->detach();
        $role->delete();
    }
}