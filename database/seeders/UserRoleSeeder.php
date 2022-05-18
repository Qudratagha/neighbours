<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryUserRoles = [
            ['user_id' => 1,'role_id' => 1]
        ];
        foreach ($aryUserRoles as $userRole) {
            \Illuminate\Support\Facades\DB::table('userRole')->insert(['role_id' => $userRole['role_id'],'user_id' => $userRole['user_id']]);
        }
    }
}
