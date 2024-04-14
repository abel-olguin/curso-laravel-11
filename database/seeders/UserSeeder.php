<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'      => 'Admin',
            'last_name' => 'Admin',
            'email'     => 'admin@admin.com',
        ]);

        User::factory(10)->create();
    }
}
