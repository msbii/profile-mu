<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors'; // Nama tabel di database
    protected $fillable = ['date', 'count']; // Kolom yang digunakan
}
