<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    protected $table = 'artists'; 
    protected $primaryKey = 'id';
    protected $fillable = ['lastname', 'firstname','tribe','artist_image'];

    public function artworks()
    {
        return $this->hasMany(Products::class, 'artist_id', 'id');
    }
}
