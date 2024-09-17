<?php

namespace App\Repositories\User;

interface UserRepositoryInterface {
    public function index();
    public function store($user);
    public function show($id);
    public function update($id, $data);
    public function destroy($id);
}