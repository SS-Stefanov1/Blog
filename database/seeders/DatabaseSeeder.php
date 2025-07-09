<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        Listing::factory(10)->create();

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Listing::create([
        //     "title"       => "Title 1",
        //     "email"       => "test@abv.bg",
        //     "tags"        => "bot,test,fun",
        //     "company"     => "google",
        //     "location"    => "California",
        //     "website"     => "https://www.google.com",
        //     "description" => "Lorem Ipsum blq Blq Bruh",
        // ]);
        // Listing::create([
        //     "title"       => "Title 2",
        //     "email"       => "testo@abv.bg",
        //     "tags"        => "bots,tests,funs",
        //     "company"     => "instagram",
        //     "location"    => "Mexico",
        //     "website"     => "https://www.ariba.com",
        //     "description" => "Lorem Ipsum blq Blq Bruh Bro",
        // ]);
    }
}
