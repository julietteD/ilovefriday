<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AccounttomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
    return [
        "title"=> 'test',
        "amount"=> '2',
        "belfiusid"=> '3',
        "datedep" => '2021-07-20',
        "comments" => '',
        "month" => 7,
        "type" => 'voiture',
        "titlealt" => ''
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

