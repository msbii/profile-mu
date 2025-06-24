<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BiodataPimpinan extends Model
{
    use HasFactory, Sluggable;

    // protected $table = 'strukturorganisasi';
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {

        //query filter
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'LIKE', '%' . $search . '%' )->orWhere('biography', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['position'] ?? false, function($query, $position){
            return $query->whereHas('position', function($query) use ($position){
                $query->where('slug', $position);
            });
        }); 
 
    }

    public function Position()
    {
        return $this->belongsTo(Lingkup::class, 'position');
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
