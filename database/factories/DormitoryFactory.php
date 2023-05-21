<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dormitory>
 */
class DormitoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => \random_int(1, 100),
            'rooms' => \random_int(100, 500),
            'floor' => \random_int(3, 9),
        ];
    }
}
