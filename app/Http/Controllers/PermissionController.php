<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionUpdateRequest;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private PermissionRepositoryInterface $permissionRepository;
    private RoleRepositoryInterface $roleRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $permissions = $this->permissionRepository->index();
        return view('permissions.index', [
            'permissions' => $permissions
        ]);
    }

    public function create()
    {
        $roles = $this->roleRepository->index();
        return view('permissions.create', [
            'roles' => $roles
        ]);
    }

    public function store(PermissionCreateRequest $request)
    {
        $this->permissionRepository->store($request->validated());
        return redirect()->route('permissions.index');
    }

    public function edit($id)
    {
        $permission = $this->permissionRepository->edit($id);
        $roles = $this->roleRepository->index();
        return view('permissions.edit', [
            'permission' => $permission,
            'roles' => $roles
        ]);
    }

    public function update($id, PermissionUpdateRequest $request)
    {
        $this->permissionRepository->update($id, $request->validated());
        return redirect()->route('permissions.index');
    }

    public function destroy($id)
    {
        $this->permissionRepository->destroy($id);
        return redirect()->route('permissions.index');   
    }
}
