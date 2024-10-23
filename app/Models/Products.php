<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products'; 
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price','product_image','category_id', 'description', 'quantity','size'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
