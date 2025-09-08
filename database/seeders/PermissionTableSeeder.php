<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'part-list',
           'part-create',
           'part-edit',
           'part-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'customer-list',
           'customer-create',
           'customer-edit',
           'customer-delete',
        ];

        foreach ($permissions as $permission) {
            // Check if the permission already exists before creating
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}