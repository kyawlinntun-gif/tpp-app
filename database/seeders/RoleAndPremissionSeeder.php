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
            $roleCreate
        ]);

        $user->givePermissionTo([
            $dashboard,
            $productList,
            $categoryList,
            $userList,
            $roleList
        ]);
    }
}
