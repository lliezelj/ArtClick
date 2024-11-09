<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews'; 
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','product_id', 'rating_percentage','comment'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
