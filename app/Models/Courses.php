<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Cviebrock\EloquentSluggable\Sluggable;

class Courses extends Model
{
    use HasApiTokens ,HasFactory,  Sluggable;
    
    public $table = 'courses';
    
    protected $fillable=['serial_by','name','description','price','image','status','course_type','level','detail_name','duration','location','column1',
                           'icon','column2','column3','column4','seo_title','seo_keyword','seo_description', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
