<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'add_to_cart'; 
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','productId', 'order_quantity','order_total','cart_status'];

public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
public function product()
{
    return $this->belongsTo(Products::class, 'productId', 'id');
}
}
