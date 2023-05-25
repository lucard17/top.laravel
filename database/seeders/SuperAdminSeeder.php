<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super = User::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);
        $super->roles()->sync(Role::where('name','super')->first()->id);
    }
}