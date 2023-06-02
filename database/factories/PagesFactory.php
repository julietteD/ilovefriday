<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
    return [
        'title' => Str::random(2),
        'body' => $faker->unique()->safeEmail,
        'slug' => Str::random(2),
  
    ];
}

/**
 * Indicate that the model's email address should be unverified.
 *
 * @return static
 */
public function unverified()
{
    return $this->state(function (array $attributes) {
        return [
        ];
    });
}
}

