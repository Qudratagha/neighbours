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
            ['module_id' => 1, 'access_level_id' => 1, 'privilegeCode' => 'CATTLE', 'privilegeName' => 'Cattle Create'],
            ['module_id' => 1, 'access_level_id' => 2, 'privilegeCode' => 'CATTLE', 'privilegeName' => 'Cattle Read'],
            ['module_id' => 1, 'access_level_id' => 3, 'privilegeCode' => 'CATTLE', 'privilegeName' => 'Cattle Update'],
            ['module_id' => 1, 'access_level_id' => 4, 'privilegeCode' => 'CATTLE', 'privilegeName' => 'Cattle Delete'],
            ['module_id' => 2, 'access_level_id' => 1, 'privilegeCode' => 'POULTRY','privilegeName' => 'Poultry Create'],
            ['module_id' => 2, 'access_level_id' => 2, 'privilegeCode' => 'POULTRY','privilegeName' => 'Poultry Read'],
            ['module_id' => 2, 'access_level_id' => 3, 'privilegeCode' => 'POULTRY','privilegeName' => 'Poultry Update'],
            ['module_id' => 2, 'access_level_id' => 4, 'privilegeCode' => 'POULTRY','privilegeName' => 'Poultry Delete'],
            ['module_id' => 3, 'access_level_id' => 1, 'privilegeCode' => 'CULTIVATION','privilegeName' => 'Cultivation Create'],
            ['module_id' => 3, 'access_level_id' => 2, 'privilegeCode' => 'CULTIVATION','privilegeName' => 'Cultivation Read'],
            ['module_id' => 3, 'access_level_id' => 3, 'privilegeCode' => 'CULTIVATION','privilegeName' => 'Cultivation Update'],
            ['module_id' => 3, 'access_level_id' => 4, 'privilegeCode' => 'CULTIVATION','privilegeName' => 'Cultivation Delete']

        ];

        foreach ($aryPrivileges as $privilege) {
            DB::table('privilege')->insert(
                [
                    'module_id' => $privilege['module_id'],
                    'access_level_id' => $privilege['access_level_id'],
                    'privilegeCode' => $privilege['privilegeCode'],
                    'privilegeName' => $privilege['privilegeName'],
                ]
            );
        }
    }
}
