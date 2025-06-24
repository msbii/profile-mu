<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Sejarah extends Model
{
    use HasFactory, Sluggable;

    //variabel yg tidak bole diisi
    protected $guarded = ['id'];
    protected $load = ['category', 'user'];//n+1 problem

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
           return $query->where('title', 'LIKE', '%' . $filters['search'] . '%' )
           ->orWhere('body', 'LIKE', '%' . $filters['search'] . '%');
        }
 
    }

    // public function  user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function  author()
    {
        return $this->belongsTo(User::class,'user_id');
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
