<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@themesbrand.com',
            'password' => Hash::make('12345678'),
            'email_verified_at'=>'2022-01-02 17:04:58',
            'avatar' => 'avatar-1.jpg',
            'organization_id'=>Organization::inRandomOrder()->first()->id,
            'created_at' => now()
        ]);
    }
}
