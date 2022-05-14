<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CattleTypeSeeder extends Seeder
{
    public function run()
    {
        $cattle = ['Cow','Goat','Sheep'];
        foreach ($cattle as $cattles){
            DB::table('cattle_types')->insert(['name'=>$cattles]);
        }
    }
}
