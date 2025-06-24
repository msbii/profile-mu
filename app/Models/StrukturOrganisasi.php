<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StrukturOrganisasi extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'strukturorganisasi';
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //    return $query->where('title', 'LIKE', '%' . $filters['search'] . '%' )
        //    ->orWhere('body', 'LIKE', '%' . $filters['search'] . '%');
        // }

        //query filter
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'LIKE', '%' . $search . '%' );
        });
 
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriStrukturOrganisasi::class, 'kategori_id');
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
