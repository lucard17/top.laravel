<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\NewsCategory;
use App\Models\NewsArticle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            SuperAdminSeeder::class,
            UserSeeder::class,
            RoleUserSeeder::class,
            NewsCategorySeeder::class,
            NewsArticleSeeder::class,
        ]);
      
        

    }
}