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
        \App\Models\User::factory()->create([
            'name' => 'Kasandra',
            'last_name' => 'Martínez',
            'email' => 'kassy@example.com',
            'degree' => 'Técnico en Desarrollo de Software Multiplataforma',
            'department' => 'Recursos Humanos',
        ]);
    }
}
