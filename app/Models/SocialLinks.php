<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLinks extends Model
{
    use HasFactory;
    
    public $table = "social_links";
    
    protected $fillable=['facebook', 'twitter', 'pinterest', 'linkedIn'];
}
