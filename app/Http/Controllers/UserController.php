<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private RoleRepositoryInterface $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $users = $this->userRepository->index();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleRepository->index();
        return view('users.create', compact('roles'));
    }

    public function store(UserCreateRequest $request)
    {
        $this->userRepository->store($request->validated());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->userRepository->show($id);
        $roles = $this->roleRepository->index();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->userRepository->update($id, $request->validated());

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->userRepository->destroy($id);

        return redirect()->back();
    }
}
