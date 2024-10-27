<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory'; 
    protected $primaryKey = 'id';
    protected $fillable = ['quantity', 'product_id'];

    public function product()
{
    return $this->belongsTo(Products::class, 'product_id', 'id');
}
public function history()
    {
        return $this->hasOne(Restock::class, 'inventory_id', 'id');
    }
}
