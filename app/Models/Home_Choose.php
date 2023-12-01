<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Choose extends Model
{
    use HasFactory;
    
    public $table = "home_coose"; 
    
    protected $fillable =['title','description'];
}
