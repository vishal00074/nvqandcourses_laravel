<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestUser extends Model
{
    use HasFactory;
    
    public $table = "guest_users";
    
    protected $fillable=['name', 'email', 'phone', 'course_id', 'payment_status', 'transection_id', 'total_amount', 'currency'];
}
