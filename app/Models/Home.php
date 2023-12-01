<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    
    public $table = "home"; 
    
    protected $fillable =['title','description','heading','subheadings','link', 'image','content','title2','description2','phone','image2','image3'];
}
