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
                'name'      => 'Purchase',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Sales',
                'parent_id' => '4'
            ],
            [
                'name'      => 'milk sale',
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

            //Expenditure
            [
            'name'      => 'FARM Salaries',
            'parent_id' => '5'
            ],
            [
                'name'      => 'FARM Purchases',
                'parent_id' => '5'
            ],
            [
                'name'      => 'FARM Medicines',
                'parent_id' => '5'
            ],
            [
                'name'      => 'FARM Vaccines',
                'parent_id' => '5'
            ],
            [
                'name'      => 'FARM Sheds',
                'parent_id' => '5'
            ],
            [
                'name'      => 'FARM utilities',
                'parent_id' => '5'
            ],
            [
                'name'      => 'FARM Others',
                'parent_id' => '5'
            ],

            [
                'name'      => 'Cow Salaries',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow Purchases',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow Medicines',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow AI-kit',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow Feeders',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow Vaccines',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow Medicine',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow Sheds',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow PackingMaterial',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow utilities',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow Transportation',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cow Others',
                'parent_id' => '5'
            ],

            [
                'name'      => 'Goat/Sheep Salaries',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Goat/Sheep Purchases',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Goat/Sheep Medicines',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Goat/Sheep Feeders',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Goat/Sheep Vaccines',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Goat/Sheep Sheds',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Goat/Sheep FeedingTray',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Goat/Sheep utilities',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Goat/Sheep Others',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry Salaries',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry Purchases',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry Medicines',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry FeedingTray',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry Vaccines',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry Sheds',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry Material',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry Transportation',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry utilities',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry Others',
                'parent_id' => '5'
            ],

            [
                'name'      => 'Cultivation Salaries',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cultivation Purchase',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cultivation Machine',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cultivation TubeWell',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cultivation Spray',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cultivation Plastic',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cultivation TunnelRepair',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cultivation PackingMaterial',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Poultry Transportation',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cultivation utilities',
                'parent_id' => '5'
            ],
            [
                'name'      => 'Cultivation Others',
                'parent_id' => '5'
            ]
            //Expenditure End
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
