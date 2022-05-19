<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryRoles = [
            ['id' => 1, 'name' => 'Super Admin', 'description' => 'Role for Super Admin']
        ];
        foreach ($aryRoles as $role) {
            DB::table('role')->insert([
                'id' => $role['id'],
                'name' => $role['name'],
                'description' => $role['description']
            ]);
        }
    }
}
