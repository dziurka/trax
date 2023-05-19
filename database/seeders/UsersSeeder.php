<?php

namespace Database\Seeders;

use Domain\Users\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(5)
            ->create();

        User::factory()
            ->create([
                'name' => 'Milo',
                'email' => 'milo@example.com',
                'password' => Hash::make('password'),
            ]);
    }
}
