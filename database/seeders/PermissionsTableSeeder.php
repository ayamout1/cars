<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'car_create',
            ],
            [
                'id'    => 18,
                'title' => 'car_edit',
            ],
            [
                'id'    => 19,
                'title' => 'car_show',
            ],
            [
                'id'    => 20,
                'title' => 'car_delete',
            ],
            [
                'id'    => 21,
                'title' => 'car_access',
            ],
            [
                'id'    => 22,
                'title' => 'price_create',
            ],
            [
                'id'    => 23,
                'title' => 'price_edit',
            ],
            [
                'id'    => 24,
                'title' => 'price_show',
            ],
            [
                'id'    => 25,
                'title' => 'price_delete',
            ],
            [
                'id'    => 26,
                'title' => 'price_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
