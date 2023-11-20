<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_barang' => $this->faker->word(),
            'jenis_barang' => $this->faker->randomElement(['topi', 'baju', 'celana', 'kaos kaki', 'sepatu']),
            'harga_barang' => $this->faker->numberBetween(100, 1000) * 500
        ];
    }
}
