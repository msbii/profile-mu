<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriKajian extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    // Pada model KategoriKajian
    public function kajians()
    {
        return $this->hasMany(Kajian::class, 'category_id');
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
