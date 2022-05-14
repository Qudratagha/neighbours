<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_heads')->insert([
            [
                'name' => 'Assets',
                'parent_id' => null
            ],
            [
                'name' => 'Liabilities',
                'parent_id' => null
            ],
            [
                'name' => 'Capitals',
                'parent_id' => null
            ],
            [
                'name' => 'Revenue',
                'parent_id' => null
            ],
            [
                'name' => 'Expense',
                'parent_id' => null
            ],
            [
                'name' => 'Cows',
                'parent_id' => null
            ],
            [
                'name' => 'Goats',
                'parent_id' => null
            ],
            [
                'name' => 'Poultry',
                'parent_id' => null
            ],
            [
                'name' => 'Cultivations',
                'parent_id' => null
            ],
            [
                'name' => 'Staff',
                'parent_id' => null
            ],
            [
                'name'      => 'Cash',
                'parent_id' => '1'
            ],
            [
                'name'      => 'Purchases',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Sales',
                'parent_id' => '4'
            ],
            [
                'name'      => 'utilities',
                'parent_id' => '5'
            ],
            [
                'name'      => 'milk',
                'parent_id' => '13'
            ]
        ]);

//        $account =
//            [
//                'Assets',
//                'Liabilities',
//                'Capital',
//                'Revenue',
//                'Expense',
//                'Cow',
//                'Goat',
//                'Poultry',
//                'Cultivation',
//                'Staff',
//                'Cash',
//                'Purchases',
//                'Sales',
//                'Utilities'
//            ];
//        foreach ($account as $accounts){
//            DB::table('account_heads')->insert(['name'=>$accounts]);
//        }
    }
}
