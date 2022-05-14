<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoultryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poultry = ['Die', 'Alive', 'Incubated','Collected', 'Purchase', 'Sick'];
        foreach ($poultry as $poultries){
            DB::table('poultry_statuses')->insert(['name'=>$poultries]);
        }
    }
}
