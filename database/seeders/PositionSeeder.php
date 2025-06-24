<?php

namespace Database\Seeders;

use App\Models\PositionPimpinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PositionPimpinan::create([
            'name' => 'Pimpinan Muhammadiyah',
            'slug' => 'Pimpinan-Muhammadiyah'
        ]);
        PositionPimpinan::create([
            'name' => 'Pimpinan Aisyiyah',
            'slug' => 'Pimpinan-Aisyiyah'
        ]);
    }
}
