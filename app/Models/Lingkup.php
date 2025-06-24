<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lingkup extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function BiodataPimpinan()
    {
        return $this->hasMany(BiodataPimpinan::class, 'position');
    }

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'location_id');
    }

    public function pelaksanaProgram()
    {
        return $this->hasMany(PelaksanaProgram::class, 'lingkup_id');
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
