<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    protected $table = 'restock_history'; 
    protected $primaryKey = 'id';
    protected $fillable = ['date','stock_quantity', 'inventory_id'];

    public function inventory()
{
    return $this->belongsTo(Inventory::class, 'inventory_id', 'id');
}
}
