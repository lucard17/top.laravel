<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRoleId = Role::firstWhere('name', 'user')->id;
        User::where('id', '>', 1)->get()->each(function ($user) use ($userRoleId) {
            $user->roles()->sync($userRoleId);
        });

    }
}