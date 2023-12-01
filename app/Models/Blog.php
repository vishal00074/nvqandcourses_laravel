<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Blog extends Model
{
    use HasApiTokens ,HasFactory;
    
    public $table = 'blogs';
    
    protected $fillable=['title','description','image'];
}
