<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imb>
 */
class imbFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_dp' => $this->faker->unique()->numerify(),
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'lokasi' => $this->faker->city,
            'box' => $this->faker->randomDigitNotNull,
            'keterangan' => $this->faker->sentence,
            'tahun' => $this->faker->year,
        ];
    }
}
