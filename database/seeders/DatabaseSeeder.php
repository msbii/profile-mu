<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Kajian;
use App\Models\Category;
use App\Models\KategoriSK;
use App\Models\KategoriKajian;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Membuat Faker factory user
            

        User::create([
            'name' => 'M. Syafri Abidin',
            'username' => 'syafriabidin',
            'email' => 'syafri.abidin@gmail.com',
            'password' => bcrypt('password')
        ]);
        // User::create([
        //     'name' => 'M. Janur Abidin',
        //     'email' => 'janur.abidin@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        User::factory(3)->create();
         

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        KategoriKajian::create([
            'name' => 'Kajian Malam Selasa',
            'slug' => 'kajian-malam-selasa'
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Malam Jumat',
            'slug' => 'kajian-malam-jumat'
        ]);
        KategoriKajian::create([
            'name' => 'Kajian Malam Kamis',
            'slug' => 'kajian-malam-kamis'
        ]);

        Kajian::factory(10)->create();

        KategoriSK::create([
            'name' => 'SK Cabang Muhammadiyah',
            'slug' => 'SK-Cabang-Muhammadiyah'
        ]);
        KategoriSK::create([
            'name' => 'SK Anggota Bagian Muhammadiyah',
            'slug' => 'SK-Anggota-Bagian-Muhammadiyah'
        ]);
        KategoriSK::create([
            'name' => 'SK Cabang Aisyiyah',
            'slug' => 'SK-Cabang-Aisyiyah'
        ]);
        KategoriSK::create([
            'name' => 'SK-Anggota-Majelis-Aisyiyah',
            'slug' => 'SK-Anggota-Majelis-Aisyiyah'
        ]);
    }
}
