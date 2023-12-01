<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    public $table = "carts";

    protected $fillable =['course_id', 'user_id', 'quantity', 'price', 'total_price', 'discounted_price','status'];
}
