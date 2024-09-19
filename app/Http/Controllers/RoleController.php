<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private RoleRepositoryInterface $roleRepository;
    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->index();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = $this->permissionRepository->index();
        return view('roles.create', compact('permissions'));
    }

    public function store(RoleCreateRequest $request)
    {
        $this->roleRepository->store($request->validated());

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = $this->roleRepository->edit($id);
        $permissions = $this->permissionRepository->index();
        return view('roles.edit', compact(['role', 'permissions']));
    }

    public function update($id, RoleUpdateRequest $request)
    {
        $role = $this->roleRepository->update($id, $request->validated());
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $this->roleRepository->destroy($id);
        return redirect()->back();
    }
}
