<?php

namespace Database\Seeders;

use App\Models\Cattle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CattleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('cattle')->insert(['parent_id'=>1, 'cattle_type_id'=>1,'account_head_id'=> 1, 'dob' => now(), 'entry_in_farm'=>now(), 'serial_no'=>0001, 'age'=>2, 'breed'=>'Australian', 'gender'=>true,'date'=>now(), 'weight'=>100,'height'=>6]);

    }
}
