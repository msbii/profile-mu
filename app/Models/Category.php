<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(Post::class);
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

     public function scopeFilter($query, array $filters)
    {
        //query filter
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('name', 'LIKE', '%' . $search . '%' )->orWhere('slug', 'LIKE', '%' . $search . '%');
        });
    }
    
}
