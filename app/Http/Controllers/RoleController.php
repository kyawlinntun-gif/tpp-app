<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->index();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleCreateRequest $request)
    {
        $this->roleRepository->store($request->validated());

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = $this->roleRepository->edit($id);
        return view('roles.edit', compact('role'));
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
