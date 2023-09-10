<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weapon extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'origin',
        'production',
        'release_date',
        'cartridge',
        'description',
        'photo_name',
        'photo_size'
    ];

    public function photo()  {
        return $this->hasOne(Photo::class);
    }
}
