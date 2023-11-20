<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PenggunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'nama' => $this->faker->name(),
           'alamat' => $this->faker->address(),
           'no_telp' => $this->faker->phoneNumber(),
           'role' => $this->faker->randomElement(['Pelanggan', 'Kasir', 'Owner'])
        ];
    }
}
