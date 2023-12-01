<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    public $table = "payments";

    protected $fillable=['user_id', 'cart_id', 'course_id', 'transection_id', 'receipt_url', 'amount', 'currency',
                            'status', 'total_amount', 'discounted_price'];
}
