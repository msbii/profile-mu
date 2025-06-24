<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRequest extends Model
{
    use HasFactory;

    //guarded = apa saja yg ga boleh diisi
    protected $guarded = ['id'];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
