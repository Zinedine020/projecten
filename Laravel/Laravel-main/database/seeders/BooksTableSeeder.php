<?php

// File: database/seeders/BooksTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example of adding some books
        Book::create([
            'title' => 'The Great Gatsby',
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
        ]);

        // Add more books as needed
    }
};
