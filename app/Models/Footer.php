<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Footer extends Model
{
    use HasApiTokens ,HasFactory;
    
    public $table = 'footer';
    
    protected $fillable=['logo','description','title','address','email','phone','copyright'];
}
