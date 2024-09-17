<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->index();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $this->userRepository->store($request->validated());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->userRepository->show($id);
        return view('users.edit', [
            'user' => $user
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
