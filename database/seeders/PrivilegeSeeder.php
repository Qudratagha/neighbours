<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryPrivileges = [
            ['module_id' => 1, 'access_level_id' => 1, 'privilegeCode' => 'COW', 'privilegeName' => 'Cow Create'],
            ['module_id' => 1, 'access_level_id' => 2, 'privilegeCode' => 'COW', 'privilegeName' => 'Cow Read'],
            ['module_id' => 1, 'access_level_id' => 3, 'privilegeCode' => 'COW', 'privilegeName' => 'Cow Update'],
            ['module_id' => 1, 'access_level_id' => 4, 'privilegeCode' => 'COW', 'privilegeName' => 'Cow Delete'],
            ['module_id' => 2, 'access_level_id' => 1, 'privilegeCode' => 'GOAT', 'privilegeName' => 'Goat Create'],
            ['module_id' => 2, 'access_level_id' => 2, 'privilegeCode' => 'GOAT', 'privilegeName' => 'Goat Read'],
            ['module_id' => 2, 'access_level_id' => 3, 'privilegeCode' => 'GOAT', 'privilegeName' => 'Goat Update'],
            ['module_id' => 2, 'access_level_id' => 4, 'privilegeCode' => 'GOAT', 'privilegeName' => 'Goat Delete'],
            ['module_id' => 3, 'access_level_id' => 1, 'privilegeCode' => 'POULTRY','privilegeName' => 'Poultry Create'],
            ['module_id' => 3, 'access_level_id' => 2, 'privilegeCode' => 'POULTRY','privilegeName' => 'Poultry Read'],
            ['module_id' => 3, 'access_level_id' => 3, 'privilegeCode' => 'POULTRY','privilegeName' => 'Poultry Update'],
            ['module_id' => 3, 'access_level_id' => 4, 'privilegeCode' => 'POULTRY','privilegeName' => 'Poultry Delete'],
            ['module_id' => 4, 'access_level_id' => 1, 'privilegeCode' => 'CULTIVATION','privilegeName' => 'Cultivation Create'],
            ['module_id' => 4, 'access_level_id' => 2, 'privilegeCode' => 'CULTIVATION','privilegeName' => 'Cultivation Read'],
            ['module_id' => 4, 'access_level_id' => 3, 'privilegeCode' => 'CULTIVATION','privilegeName' => 'Cultivation Update'],
            ['module_id' => 4, 'access_level_id' => 4, 'privilegeCode' => 'CULTIVATION','privilegeName' => 'Cultivation Delete'],
            ['module_id' => 5, 'access_level_id' => 1, 'privilegeCode' => 'DASHBOARD', 'privilegeName' => 'Dashboard Create'],
            ['module_id' => 5, 'access_level_id' => 2, 'privilegeCode' => 'DASHBOARD', 'privilegeName' => 'Dashboard Read'],
            ['module_id' => 5, 'access_level_id' => 3, 'privilegeCode' => 'DASHBOARD', 'privilegeName' => 'Dashboard Update'],
            ['module_id' => 5, 'access_level_id' => 4, 'privilegeCode' => 'DASHBOARD', 'privilegeName' => 'Dashboard Delete'],
            ['module_id' => 6, 'access_level_id' => 1, 'privilegeCode' => 'RATE', 'privilegeName' => 'Rate Create'],
            ['module_id' => 6, 'access_level_id' => 2, 'privilegeCode' => 'RATE', 'privilegeName' => 'Rate Read'],
            ['module_id' => 6, 'access_level_id' => 3, 'privilegeCode' => 'RATE', 'privilegeName' => 'Rate Update'],
            ['module_id' => 6, 'access_level_id' => 4, 'privilegeCode' => 'RATE', 'privilegeName' => 'Rate Delete']

        ];

        foreach ($aryPrivileges as $privilege) {
            DB::table('privilege')->insert(
                [
                    'module_id' => $privilege['module_id'],
                    'access_level_id' => $privilege['access_level_id'],
                    'privilegeCode' => $privilege['privilegeCode'],
                    'privilegeName' => $privilege['privilegeName']
                ]
            );
        }
    }
}
