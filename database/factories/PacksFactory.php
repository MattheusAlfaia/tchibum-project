<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PacksFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      
        return [
            'preco' => fake(),
            'dias' => fake(),
            'nome' => fake()->name(),
            'local' => fake()->name(),
            'info' => Str::random(10),
            'info2' => Str::random(10),
            'info3' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
  
}
