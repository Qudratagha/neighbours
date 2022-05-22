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
            ['id' => 1, 'moduleCode' => 'COW','moduleName' => 'Cow Module'],
            ['id' => 2, 'moduleCode' => 'GOAT','moduleName' => 'Goat Module'],
            ['id' => 3, 'moduleCode' => 'POULTRY','moduleName' => 'Poultry Module'],
            ['id' => 4, 'moduleCode' => 'CULTIVATION','moduleName' => 'Cultivation Module'],
            ['id' => 5, 'moduleCode' => 'DASHBOARD','moduleName' => 'Dashboard Module'],
            ['id' => 6, 'moduleCode' => 'RATE','moduleName' => 'Rate Module']
        ];
        foreach ($aryModules as $module) {
            DB::table('modules')->insert(['moduleCode' => $module['moduleCode'],'moduleName' => $module['moduleName'],'id' => $module['id']]);
        }
    }
}
