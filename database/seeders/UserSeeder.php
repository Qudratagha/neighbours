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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123')
            ],
            [
                'name' => 'cow',
                'email' => 'cow@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('cow123')
            ],
            [
                'name' => 'goat',
                'email' => 'goat@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('goat123')
            ],
            [
                'name' => 'poultry',
                'email' => 'poultry@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('poultry123')
            ],
            [
                'name' => 'cultivation',
                'email' => 'cultivation@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('cultivation123')

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
