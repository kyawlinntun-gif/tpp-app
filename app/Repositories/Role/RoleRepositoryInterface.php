<?php

namespace App\Repositories\Role;

interface RoleRepositoryInterface {
    public function index();
    public function store($data);
    public function edit($id);
    public function update($id, $data);
    public function destroy($id);
}