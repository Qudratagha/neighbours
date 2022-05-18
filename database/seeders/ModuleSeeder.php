<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryModules = [
            ['id' => 1, 'moduleCode' => 'CATTLE','moduleName' => 'Cattle Module'],
            ['id' => 2, 'moduleCode' => 'POULTRY','moduleName' => 'Poultry Module'],
            ['id' => 3, 'moduleCode' => 'CULTIVATION','moduleName' => 'Cultivation Module'],
        ];
        foreach ($aryModules as $module) {
            DB::table('modules')->insert(['moduleCode' => $module['moduleCode'],'moduleName' => $module['moduleName'],'id' => $module['id']]);
        }
    }
}
