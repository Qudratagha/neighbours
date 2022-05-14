<?php

namespace Database\Seeders;

use App\Models\Cattle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



        $this->call([
            AccountSeeder::class,
//            FeedSeeder::class,
            TransactionTypeSeeder::class,
            CultivationTypeSeeder::class,
//            CultivationSeeder::class,
            CattleTypeSeeder::class,
            PoultryTypeSeeder::class,
//            PoultryStatusSeeder::class,
//            PoultrySeeder::class,
//            DrySeeder::class,
//            DeadSeeder::class,
//            CattleSeeder::class,
//            DelverySeeder::class,
//            InseminationSeeder::class,
//            PregnantSeeder::class,
//            MedicineSeeder::class,
//            VaccineSeeder::class

        ]);
    }
}
