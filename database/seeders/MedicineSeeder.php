<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Panadol', 'Ponston', 'Disperin'];
        foreach ($name as $names){
            DB::table('medicines')->insert(['name'=>$names, 'description'=>'testing']);
        }
    }
}
