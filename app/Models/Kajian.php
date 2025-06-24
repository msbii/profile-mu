<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kajian extends Model
{
    use HasFactory, Sluggable;

    //variabel yg tidak bole diisi
    protected $guarded = ['id'];
    protected $load = ['kategoriKajian', 'user'];//n+1 problem

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //    return $query->where('title', 'LIKE', '%' . $filters['search'] . '%' )
        //    ->orWhere('body', 'LIKE', '%' . $filters['search'] . '%');
        // }

        //query filter
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'LIKE', '%' . $search . '%' )->orWhere('body', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['kategoriKajian'] ?? false, function($query, $kategoriKajian){
            return $query->whereHas('kategoriKajian', function($query) use ($kategoriKajian){
                $query->where('slug', $kategoriKajian);
            });
        }); 

        $query->when($filters['user'] ?? false, function($query, $user){
            return $query->whereHas('user', function($query) use ($user){
                $query->where('username', $user);
            });
        }); 
 
    }

    // public function  user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function  author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    // Pada model Kajian
    public function kategoriKajian()
    {
        return $this->belongsTo(KategoriKajian::class, 'category_id');
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
