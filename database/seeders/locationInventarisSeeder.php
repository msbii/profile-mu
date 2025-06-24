<?php

namespace Database\Seeders;

use App\Models\LocationInventaris;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class locationInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        LocationInventaris::create([
            'name' => 'Lingkup Muhammadiyah',
            'slug' => 'Lingkup-muhammadiyah'
        ]);
        LocationInventaris::create([
            'name' => 'Lingkup Aisyiyah',
            'slug' => 'Lingkup-aisyiyah'
        ]);
    }
}
