<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Imb;

class imbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        imb::truncate();
        imb::factory()->count(2013)->create();
    }
}
