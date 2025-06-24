<?php

namespace App\Models;

use App\Models\SK;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriSK extends Model
{
    use HasFactory, Sluggable;

    // Tentukan nama tabel secara eksplisit
    // protected $table = 'kategori_sk';
    protected $guarded = ['id'];

    public function sk()
    {
        return $this->hasMany(SK::class, 'kategori_sk_id');
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
