<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    
    public $table = "contact_us";
    
    protected $fillable=['title', 'address', 'email', 'phone' , 'map','image','background_image'];
}
