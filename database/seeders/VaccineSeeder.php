<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacc = ['aaa', 'bbb', 'ccc'];
        foreach ($vacc as $vaccination){
            DB::table('vaccinations')->insert(['sub_head_id'=> 1, 'name'=>$vaccination,'description'=>'testing']);
        }
    }
}
