<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'age' => $this->faker->numberBetween(18, 30),
            'email' => $this->faker->unique()->safeEmail,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'birthdate' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'status' => $this->faker->boolean(50),
            'category_id' => Category::inRandomOrder()->first()->id

            ,
        ];
    }
}
