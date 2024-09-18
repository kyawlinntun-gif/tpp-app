<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPremissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $dashboard = Permission::create(['name' => 'dashboard']);
        $productList = Permission::create(['name' => 'productList']);
        $productCreate = Permission::create(['name' => 'productCreate']);
        $productEdit = Permission::create(['name' => 'productEdit']);
        $productDelete = Permission::create(['name' => 'productDelete']);

        $categoryList = Permission::create(['name' => 'categoryList']);
        $categoryCreate = Permission::create(['name' => 'categoryCreate']);
        $categoryEdit = Permission::create(['name' => 'categoryEdit']);
        $categoryDelete = Permission::create(['name' => 'categoryDelete']);

        $userList = Permission::create(['name' => 'userList']);
        $userCreate = Permission::create(['name' => 'userCreate']);
        $userEdit = Permission::create(['name' => 'userEdit']);
        $userDelete = Permission::create(['name' => 'userDelete']);

        $roleList = Permission::create(['name' => 'roleList']);
        $roleCreate = Permission::create(['name' => 'roleCreate']);
        $roleEdit = Permission::create(['name' => 'roleEdit']);
        $roleDelete = Permission::create(['name' => 'roleDelete']);

        $permissionList = Permission::create(['name' => 'permissionList']);
        $permissionCreate = Permission::create(['name' => 'permissionCreate']);
        $permissionEdit = Permission::create(['name' => 'permissionEdit']);
        $permissionDelete = Permission::create(['name' => 'permissionDelete']);

        $admin->givePermissionTo([
            $dashboard,
            $productList,
            $productCreate,
            $productEdit,
            $productDelete,
            $categoryList,
            $categoryCreate,
            $categoryEdit,
            $categoryDelete,
            $userList,
            $userCreate,
            $userEdit,
            $userDelete,
            $roleList,
            $roleCreate,
            $roleEdit,
            $roleDelete,
            $permissionList,
            $permissionCreate,
            $permissionEdit,
            $permissionDelete
        ]);

        $user->givePermissionTo([
            $dashboard,
            $productList,
            $categoryList,
            $userList,
            $roleList,
            $permissionList
        ]);
    }
}
