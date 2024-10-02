<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imb>
 */
class imbFactory extends Factory
{
    protected static $counters = []; // Array untuk menyimpan nomor DP berdasarkan tahun

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Ambil tahun acak antara 1999 dan 2001
        $tahun = $this->faker->numberBetween(1999, 2003);

        // Inisialisasi counter untuk tahun ini jika belum ada
        if (!isset(self::$counters[$tahun])) {
            self::$counters[$tahun] = 1; // Mulai dari 1 untuk tahun ini
        } 

        // Ambil nomor DP saat ini
        $nomorDp = self::$counters[$tahun];

        // Increment counter untuk tahun ini
        self::$counters[$tahun]++;

        // Tentukan box berdasarkan nomor DP
        if ($nomorDp <= 525) {
            $box = ceil($nomorDp / 35); // Setiap 35 nomor DP memiliki box yang sama, minimum 15 box
        } else {
            $box = 16; // Maksimal 16 box jika nomor DP lebih dari 525
        }

        return [
            'nomor_dp' => $nomorDp,  // Nomor DP yang berurutan per tahun
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'lokasi' => $this->faker->city,
            'box' => $box,  // Box diatur antara 15 hingga 16
            'keterangan' => $this->faker->sentence,
            'tahun' => $tahun,
            'imbs' => $this->faker->name,
        ];
    }
}
