<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuery extends Model
{
    use HasFactory;
    
    public $table = 'user_queries';
    
    protected $fillable =['user_id', 'name', 'email', 'phone', 'about_what', 'message'];
}
