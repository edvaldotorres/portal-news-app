<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_has_permissions = [
            [
                'permission_id' => '1',
                'role_id' => '1',
            ],
            [
                'permission_id' => '2',
                'role_id' => '1',
            ],
            [
                'permission_id' => '3',
                'role_id' => '1',
            ],
            [
                'permission_id' => '4',
                'role_id' => '1',
            ],
            [
                'permission_id' => '5',
                'role_id' => '1',
            ],
            [
                'permission_id' => '6',
                'role_id' => '1',
            ],
            [
                'permission_id' => '7',
                'role_id' => '1',
            ],
            [
                'permission_id' => '8',
                'role_id' => '1',
            ],
            [
                'permission_id' => '9',
                'role_id' => '1',
            ],
            [
                'permission_id' => '10',
                'role_id' => '1',
            ],
            [
                'permission_id' => '11',
                'role_id' => '1',
            ],
            [
                'permission_id' => '12',
                'role_id' => '1',
            ],
            [
                'permission_id' => '13',
                'role_id' => '1',
            ],
        ];

        foreach ($role_has_permissions as $role_has_permission) {
            DB::table('role_has_permissions')->insert([
                'permission_id' => $role_has_permission['permission_id'],
                'role_id' => $role_has_permission['role_id'],
            ]);
        }
    }
}
