<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@mail.me',
             'password' => Hash::make('admin')
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Agent',
             'email' => 'agent@mail.me',
             'password' => Hash::make('agent')
         ]);

         $this->call([
             CategoriesSeeder::class,
             LabelsSeeder::class,
             RolesSeeder::class,
         ]);

         \App\Models\User::factory(10)
             ->create()
             ->each(fn ($user) => $user->assignRole('user'));
    }
}
