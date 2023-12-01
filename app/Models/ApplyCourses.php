<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyCourses extends Model
{
    use HasFactory;
    
    public $table = "apply_courses";
    
    protected $fillable=['course_id', 'name', 'email', 'phone', 'gender'];
}
