<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->times(20)
            ->create();
        //$this->call([
        //    UserSeeder::class,
        //    PostSeeder::class
        //]);
    }
}
