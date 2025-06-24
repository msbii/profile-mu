<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PelaksanaProgram extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //    return $query->where('title', 'LIKE', '%' . $filters['search'] . '%' )
        //    ->orWhere('body', 'LIKE', '%' . $filters['search'] . '%');
        // }

        //query filter
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'LIKE', '%' . $search . '%' )->orWhere('description', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['lingkup'] ?? false, function($query, $lingkup){
            return $query->whereHas('lingkup', function($query) use ($lingkup){
                $query->where('slug', $lingkup);
            });
        }); 
 
    }

    public function Lingkup()
    {
        return $this->belongsTo(Lingkup::class, 'lingkup_id');
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
