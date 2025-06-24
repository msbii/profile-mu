<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriStrukturOrganisasi extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'kategori_strukturorganisasi';
    protected $guarded = ['id'];

    public function StrukturOrganisasi()
    {
        return $this->hasMany(StrukturOrganisasi::class, 'kategori_id');
    }

    //Membuat slug otomatis
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
