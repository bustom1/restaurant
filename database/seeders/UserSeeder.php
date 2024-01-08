<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manajer=User::create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '080',
            'role' => 'manager'
        ]);

        $kasi = User::create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '080',
            'role' => 'kasir'
        ]);

        $client = User::create([
            'name' => 'meja1',
            'email' => 'meja1@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '080',
            'role' => 'client'
        ]);

        $client2 = User::create([
            'name' => 'meja2',
            'email' => 'meja2@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '080',
            'role' => 'client'
        ]);
    }
}
