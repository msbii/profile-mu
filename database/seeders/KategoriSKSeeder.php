<?php

namespace Database\Seeders;

use App\Models\KategoriSK;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // KategoriSK::create([
        //     'name' => 'SK Cabang Muhammadiyah',
        //     'slug' => 'SK-Cabang-Muhammadiyah'
        // ]);
        // KategoriSK::create([
        //     'name' => 'SK Anggota Bagian Muhammadiyah',
        //     'slug' => 'SK-Anggota-Bagian-Muhammadiyah'
        // ]);
        // KategoriSK::create([
        //     'name' => 'SK Cabang Aisyiyah',
        //     'slug' => 'SK-Cabang-Aisyiyah'
        // ]);
        // KategoriSK::create([
        //     'name' => 'SK-Anggota Majelis Aisyiyah',
        //     'slug' => 'SK-Anggota-Majelis-Aisyiyah'
        // ]);
        KategoriSK::create([
            'name' => 'SK Ranting Masjid Al Amien',
            'slug' => 'SK-Ranting-Masjid-Al-Amien'
        ]);
        KategoriSK::create([
            'name' => 'SK Ranting Masjid Safinatullah',
            'slug' => 'SK-Ranting-Masjid-Safinatullah'
        ]);
        KategoriSK::create([
            'name' => 'SK Ranting Masjid Baiturohman',
            'slug' => 'SK-Ranting-Masjid-Baiturohman'
        ]);
        KategoriSK::create([
            'name' => 'SK Ranting Masjid Al Ikhsan',
            'slug' => 'SK-Ranting-Masjid-Al-Ikhsan'
        ]);
        KategoriSK::create([
            'name' => 'SK Ranting Masjid Al Khasanah',
            'slug' => 'SK-Ranting-Masjid-Al-Khasanah'
        ]);
        KategoriSK::create([
            'name' => 'SK Ranting Masjid Al Hikmah',
            'slug' => 'SK-Ranting-Masjid-Al-Hikmah'
        ]);
    }
}
