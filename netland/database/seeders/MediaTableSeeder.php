<?php

namespace Database\Seeders;

// MediaTableSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediaTableSeeder extends Seeder
{
    public function run()
    {
        // Voeg media toe
        Media::create([
            'title' => 'The Shawshank Redemption',
            'rating' => '9.3',
            'length_in_minutes' => 142,
            'released_at' => '1994-09-10',
            'country_of_origin' => 'USA',
            'youtube_trailer_id' => 'video123',
            'summary' => 'Two imprisoned men bond over a number of years...',
            'spoken_in_language' => 'English',
            'is_movie' => true,
        ]);

        Media::create([
            'title' => 'The Godfather',
            'rating' => '9.2',
            'length_in_minutes' => 175,
            'released_at' => '1972-03-24',
            'country_of_origin' => 'USA',
            'youtube_trailer_id' => 'video456',
            'summary' => 'The aging patriarch of an organized crime...',
            'spoken_in_language' => 'English',
            'is_movie' => true,
        ]);

        // Voeg meer media toe indien nodig
    }
}
