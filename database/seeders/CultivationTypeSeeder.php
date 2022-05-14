<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CultivationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cultivation = ['Wheat', 'Corn', 'Cucumber'];
        foreach ($cultivation as $cultivations){
            DB::table('cultivation_types')->insert(['name'=>$cultivations]);
        }
    }
}
