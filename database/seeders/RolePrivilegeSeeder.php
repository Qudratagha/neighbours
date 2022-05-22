<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryRolePrivileges = [
            ['role_id' => 1,'privilege_id' => 1],
            ['role_id' => 1,'privilege_id' => 2],
            ['role_id' => 1,'privilege_id' => 3],
            ['role_id' => 1,'privilege_id' => 4],
            ['role_id' => 1,'privilege_id' => 5],
            ['role_id' => 1,'privilege_id' => 6],
            ['role_id' => 1,'privilege_id' => 7],
            ['role_id' => 1,'privilege_id' => 8],
            ['role_id' => 1,'privilege_id' => 9],
            ['role_id' => 1,'privilege_id' => 10],
            ['role_id' => 1,'privilege_id' => 11],
            ['role_id' => 1,'privilege_id' => 12],
            ['role_id' => 1,'privilege_id' => 13],
            ['role_id' => 1,'privilege_id' => 14],
            ['role_id' => 1,'privilege_id' => 15],
            ['role_id' => 1,'privilege_id' => 16],
            ['role_id' => 1,'privilege_id' => 17],
            ['role_id' => 1,'privilege_id' => 18],
            ['role_id' => 1,'privilege_id' => 19],
            ['role_id' => 1,'privilege_id' => 20],
            ['role_id' => 1,'privilege_id' => 21],
            ['role_id' => 1,'privilege_id' => 22],
            ['role_id' => 1,'privilege_id' => 23],
            ['role_id' => 1,'privilege_id' => 24],

            ['role_id' => 2,'privilege_id' => 1],
            ['role_id' => 2,'privilege_id' => 2]
        ];
        foreach ($aryRolePrivileges as $rolePrivilege) {
            DB::table('rolePrivilege')->insert(
                [
                    'role_id' => $rolePrivilege['role_id'],
                    'privilege_id' => $rolePrivilege['privilege_id']
                ]
            );
        }
    }
}
