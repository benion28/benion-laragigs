<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(7),
            'tags' => 'laravel, api, backend',
            'company' => fake()->company(),
            'location' => fake()->city(),
            'email' => fake()->companyEmail(),
            'website' => fake()->url(),
            'user_id' => fake()->numberBetween(1, 30)
        ];

        // return [
        //     'title' => fake()->sentence(),
        //     'description' => fake()->paragraph(7),
        //     'tags' => 'laravel, api, backend',
        //     'company' => fake()->company(),
        //     'location' => fake()->city(),
        //     'email' => fake()->companyEmail(),
        //     'website' => fake()->url()
        // ];
    }
}
