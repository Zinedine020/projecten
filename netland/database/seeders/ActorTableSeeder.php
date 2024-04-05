<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor; // Voeg Actor toe

class ActorTableSeeder extends Seeder
{
    public function run()
    {
        // Voeg acteurs toe
        $morganFreeman = Actor::create([
            'first_name' => 'Morgan',
            'last_name' => 'Freeman',
            'age' => 84,
            'sex' => 'Male',
            'country' => 'USA',
            'has_won_awards' => true,
        ]);

        $marlonBrando = Actor::create([
            'first_name' => 'Marlon',
            'last_name' => 'Brando',
            'age' => 80,
            'sex' => 'Male',
            'country' => 'USA',
            'has_won_awards' => true,
        ]);
        

        // Voeg meer acteurs of koppelingen toe indien nodig
    }
}
