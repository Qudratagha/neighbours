<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CultivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cultivations')->insert(['cultivation_type_id'=>1, 'fertilizer'=>'Hen','total_area_cultivated'=>2000,'account_head_id'=>8]);
    }
}
