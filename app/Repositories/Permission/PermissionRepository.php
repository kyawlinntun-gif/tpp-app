<?php

namespace App\Repositories\Permission;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRepository implements PermissionRepositoryInterface {
    public function index()
    {
        $permissions = Permission::all();
        return $permissions;
    }

    public function store($data)
    {
        $permission = Permission::create($data);

        foreach($data['role_id'] as $role_id) {
            $role = Role::findOrFail($role_id);
            $role->givePermissionTo($permission);
        }
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return $permission;
    }

    public function update($id, $data)
    {
        $permission = Permission::findOrFail($id);

        $permission->update($data);

        $permission->roles()->sync($data['role_id']);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->roles()->detach();
        $permission->delete();
    }
}