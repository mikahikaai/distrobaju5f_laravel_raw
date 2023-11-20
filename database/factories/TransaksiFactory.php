<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pengguna_id' => $this->faker->numberBetween(1,15),
            'barang_id' => $this->faker->numberBetween(1,50),
            'qty' => $this->faker->numberBetween(1,5)
        ];
    }
}
