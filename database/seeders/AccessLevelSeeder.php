<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryAccessLevels = [
            ['id' => 1, 'name' => 'Create'],
            ['id' => 2, 'name' => 'Read'],
            ['id' => 3, 'name' => 'Update'],
            ['id' => 4, 'name' => 'Delete']
        ];
        foreach ($aryAccessLevels as $accessLevel) {
            DB::table('accessLevel')->insert(['name' => $accessLevel['name'],'id' => $accessLevel['id']]);
        }
    }
}
