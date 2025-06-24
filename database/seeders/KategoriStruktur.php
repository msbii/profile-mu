<?php

namespace Database\Seeders;

use App\Models\KategoriStrukturOrganisasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriStruktur extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        KategoriStrukturOrganisasi::create([
            'name' => 'Struktur Organisasi Muhammadiyah',
            'slug' => 'Struktur-Organisasi-Muhammadiyah'
        ]);
        KategoriStrukturOrganisasi::create([
            'name' => 'Struktur Organisasi Aisyiyah',
            'slug' => 'Struktur-Organisasi-Aisyiyah'
        ]);
        KategoriStrukturOrganisasi::create([
            'name' => 'Struktur Organisasi Masjid Al Amien',
            'slug' => 'Struktur-Organisasi-Masjid-Al-Amien'
        ]);
        KategoriStrukturOrganisasi::create([
            'name' => 'Struktur Organisasi Masjid Safinatullah',
            'slug' => 'Struktur-Organisasi-Masjid-Safinatullah'
        ]);
        KategoriStrukturOrganisasi::create([
            'name' => 'Struktur Organisasi Masjid Baiturohman',
            'slug' => 'Struktur-Organisasi-Masjid-Baiturohman'
        ]);
        KategoriStrukturOrganisasi::create([
            'name' => 'Struktur Organisasi Masjid Al Ikhsan',
            'slug' => 'Struktur-Organisasi-Masjid-Al-Ikhsan'
        ]);
        KategoriStrukturOrganisasi::create([
            'name' => 'Struktur Organisasi Masjid Al Khasanah',
            'slug' => 'Struktur-Organisasi-Masjid-Al-Khasanah'
        ]);
        KategoriStrukturOrganisasi::create([
            'name' => 'Struktur Organisasi Masjid Al Hikmah',
            'slug' => 'Struktur-Organisasi-Masjid-Al-Hikmah'
        ]);
    }
}
