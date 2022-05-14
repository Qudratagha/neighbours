<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feed = ['Cow feed','Goat Feed','hen Feed'];
        foreach ($feed as $feeds){
            DB::table('feeds')->insert(['name'=>$feeds,'quantity' => 2222]);
        }
    }
}
