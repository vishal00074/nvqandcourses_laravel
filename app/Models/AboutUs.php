<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    
    public $table = "about_us";
    
    protected $fillable=['title', 'description','titleA', 'column1','titleB', 'column2' , 'skill_title' , 'skill_description','image'];
}
