<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $aryUserRoles = [
            [
                'name' => 'umair',
                'email' => 'umair@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('umair123')
            ],
            [
                'name' => 'cow',
                'email' => 'cow@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('cow123')
            ],
<<<<<<< HEAD
=======
                [
                'name' => 'goat',
                'email' => 'goat@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('goat123')
                ],
>>>>>>> umair
            [
                'name' => 'poultry',
                'email' => 'poultry@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('poultry123')
<<<<<<< HEAD
=======
            ],

            [
                'name' => 'cultivation',
                'email' => 'cultivation@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('cultivation123')
>>>>>>> umair
            ]
        ];
        foreach ($aryUserRoles as $userRole) {
            \Illuminate\Support\Facades\DB::table('users')->insert(
                [
                    'name' => $userRole['name'],
                    'email' => $userRole['email'],
                    'password' => $userRole['password']
                ]);
        }
    }
}
