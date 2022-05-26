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
                'name'      => 'milk sale',
                'parent_id' => '13'
            ],
            [
                'name'      => 'wheat sale',
                'parent_id' => '13'
            ],
            [
                'name'      => 'cucumber sale',
                'parent_id' => '13'
            ],
            [
                'name'      => 'corn sale',
                'parent_id' => '13'
            ],
            [
                'name'      => 'cow sale',
                'parent_id' => '13'
            ],
            [
                'name'      => 'cow purchase',
                'parent_id' => '12'
            ],
            [
                'name'      => 'goat/sheep sale',
                'parent_id' => '13'
            ],
            [
                'name'      => 'goat/sheep purchase',
                'parent_id' => '12'
            ],
            [
                'name'      => 'egg sale',
                'parent_id' => '13'
            ],
            [
                'name'      => 'hen sale',
                'parent_id' => '13'
            ],
            [
                'name'      => 'chick sale',
                'parent_id' => '13'
            ],
            [
                'name'      => 'milk collection',
                'parent_id' => '6'
            ],

            [
                'name'      => 'wheat collection',
                'parent_id' => '9'
            ],
            [
                'name'      => 'corn collection',
                'parent_id' => '9'
            ],
            [
                'name'      => 'cucumber collection',
                'parent_id' => '9'
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
