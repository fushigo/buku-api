<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Username' => $this->faker->unique()->userName(),
            'Password' => static::$password ??= Hash::make('password'),
            'Email' => $this->faker->unique()->email(),
            'NamaLengkap' => $this->faker->name(),
            'Alamat' => $this->faker->address(),
        ];
    }
}
