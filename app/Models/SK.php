<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SK extends Model
{
    use HasFactory, Sluggable;

    protected $table = 's_k_s'; // Pastikan nama tabel
    //variabel yg tidak bole diisi
    protected $guarded = ['id'];
    protected $load = ['kategoriSK'];//n+1 problem

    public function scopeFilter($query, array $filters)
    {

        //query filter
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'LIKE', '%' . $search . '%' )->orWhere('tahun', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['kategori'] ?? false, function($query, $kategori){
            return $query->whereHas('kategori', function($query) use ($kategori){
                $query->where('slug', $kategori);
            });
        }); 
 
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriSK::class, 'kategori_sk_id');
    }

    //agar route resource dapat menggunakan slug
    public function getRouteKeyName()
    {
        return 'slug';
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
