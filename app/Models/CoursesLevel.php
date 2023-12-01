<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CoursesLevel extends Model
{
    use HasFactory, Sluggable;
    
    public $table = "courses_levels";
    
    protected $fillable=['level', 'slug', 'description', 'status'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'level'
            ]
        ];
    }
}
