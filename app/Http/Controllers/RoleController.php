<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(RoleCreateRequest $request)
    {
        
    }
}
