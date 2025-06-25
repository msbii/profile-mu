<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    //variabel yg tidak bole diisi
    protected $guarded = ['id'];
    protected $load = ['category', 'user'];//n+1 problem

    // public function scopeFilter($query, array $filters)
    // {
    //     // if (isset($filters['search']) ? $filters['search'] : false) {
    //     //    return $query->where('title', 'LIKE', '%' . $filters['search'] . '%' )->orWhere('body', 'LIKE', '%' . $filters['search'] . '%');
    //     // }

    //     //query filter
    //     $query->when($filters['search'] ?? false, function($query, $search){
    //         return $query->where('title', 'LIKE', '%' . $search . '%' )->orWhere('body', 'LIKE', '%' . $search . '%');
    //     });

    //     $query->when($filters['category'] ?? false, function($query, $category){
    //         return $query->whereHas('category', function($query) use ($category){
    //             $query->where('slug', $category);
    //         });
    //     }); 

    //     $query->when($filters['user'] ?? false, function($query, $user){
    //         return $query->whereHas('user', function($query) use ($user){
    //             $query->where('username', $user);
    //         });
    //     }); 
 
    // }
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

    public function category()
    {
        return $this->belongsTo(Category::class);
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
