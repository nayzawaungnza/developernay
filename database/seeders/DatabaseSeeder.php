<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'phone' => '09256530563',
            'gender' => 'male',
            'address' => 'Yangon',
            'role' => 'admin',
            'password' => Hash::make('password'),

        ]);

        User::create([
            'name' => 'SSS Web',
            'email' => 'ssswebdev1@gmail.com',
            'phone' => '09940844237',
            'gender' => 'male',
            'address' => 'Yangon',
            'password' => Hash::make('password'),

        ]);
    }
}
