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
            ['id' => 1, 'name' => 'Super Admin', 'description' => 'Role for Super Admin'],
            ['id' => 2, 'name' => 'Cow Supervisor', 'description' => 'Role for Cow Supervisor'],
            ['id' => 3, 'name' => 'Goat Supervisor', 'description' => 'Role for Goat Supervisor'],
            ['id' => 4, 'name' => 'Poultry Supervisor', 'description' => 'Role for Poultry Supervisor'],
            ['id' => 5, 'name' => 'Cultivation Supervisor', 'description' => 'Role for Cultivation Supervisor']

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
