<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders'; 
    protected $primaryKey = 'id';
    protected $fillable = ['userId','products', 'status','total_price','order_date','mode_of_payment','gcash_reference','created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
