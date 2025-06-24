<?php

namespace Database\Seeders;

use App\Models\Lingkup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LingkupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Lingkup::create([
            'name' => 'Muhammadiyah',
            'slug' => 'muhammadiyah'
        ]);
        Lingkup::create([
            'name' => 'Aisyiyah',
            'slug' => 'aisyiyah'
        ]);
    }
}
