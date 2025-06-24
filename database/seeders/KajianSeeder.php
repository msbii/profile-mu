<?php

namespace Database\Seeders;

use App\Models\KategoriKajian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        KategoriKajian::create([
            'name' => 'Kajian Jumat Pon',
            'slug' => 'kajian-Jumat-Pon'
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Pimpinan',
            'slug' => 'kajian-pimpinan'
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Ibu Ibu Shakinah',
            'slug' => 'kajian-Ibu-Ibu-Shakinah'
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Masjid Al Amien',
            'slug' => 'kajian-Masjid-Al-Amien'
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Masjid Safinatullah',
            'slug' => 'kajian-Masjid-Safinatullah'
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Masjid Baiturohman',
            'slug' => 'kajian-Masjid-Baiturohman'
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Masjid Al Ikhsan',
            'slug' => 'kajian-Masjid-Al-Ikhsan'
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Masjid Al Khasanah',
            'slug' => 'kajian-Masjid-Al-khasanah '
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Masjid Al Hikmah',
            'slug' => 'kajian-Masjid-Al-Hikmah'
        ]);
    }
}
