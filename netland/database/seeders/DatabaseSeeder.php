<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ActorTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(FilmsTableSeeder::class);
        // Voeg andere seeders hier toe indien nodig
    }
}
