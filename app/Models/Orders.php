<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders'; 
    protected $primaryKey = 'id';
    protected $fillable = ['userId','product_id', 'status','total_price','order_date'];

    public function userOder()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
    public function productOrder()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }
}
