<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products'; 
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price','product_image','category_id', 'description','size','artist_id', 'frame'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function artist()
    {
        return $this->belongsTo(Artists::class, 'artist_id', 'id');
    }
    public function inventory()
    {
        return $this->hasOne(Inventory::class. 'product_id', 'id');
    }
    public function productCart()
    {
        return $this->hasMany(Cart::class, 'productId', 'id');
    }
    public function productReview()
    {
        return $this->hasMany(Reviews::class, 'product_id', 'id');
    }
}
