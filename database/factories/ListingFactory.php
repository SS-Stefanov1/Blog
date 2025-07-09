<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/** @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing> */
class ListingFactory extends Factory {
    public function definition(): array {
        return [
            "title"       => fake()->word(),
            "tags"        => implode(',', fake()->words()),
            "email"       => fake()->unique()->companyEmail(),
            "company"     => fake()->company(),
            "website"     => fake()->url(),
            "location"    => fake()->country(),
            "description" => fake()->paragraph(5),
        ];
    }
}
