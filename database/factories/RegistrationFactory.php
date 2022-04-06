<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'religion' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Kong Hu Chu']),
            'major' => $this->faker->randomElement(['Rekayasa Perangkat Lunak', 'Tata Boga', 'Tata Busana', 'Multimedia']),
            'junior_high_school' => $this->faker->company(),
            'registration_number' => $this->faker->randomNumber(),
        ];
    }
}
