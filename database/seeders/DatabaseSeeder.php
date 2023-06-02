<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          \App\Models\User::factory(1)->create();
          \App\Models\Accounts::factory(1)->create();
        //  \App\Models\AccountToms::factory(1)->create();
        //  \App\Models\Daylistitems::factory(1)->create();
        //  \App\Models\Pages::factory(1)->create();
        //  \App\Models\Todobydays::factory(1)->create();
        //  \App\Models\Todos::factory(1)->create();

     //  \App\Models\User::factory()->create([
       //      'name' => 'Test User',
        //    'email' => 'test@example.com',
        // ]);
    }
}
