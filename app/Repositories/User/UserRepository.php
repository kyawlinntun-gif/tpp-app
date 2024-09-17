<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function store($user)
    {
        User::create($user);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function update($id, $data)
    {
        $user = $this->show($id);
        $user->update($data);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}