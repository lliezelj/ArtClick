<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages'; 
    protected $primaryKey = 'id';
    protected $fillable = ['fullname', 'email','phone','subject', 'message','status','reply'];
}
