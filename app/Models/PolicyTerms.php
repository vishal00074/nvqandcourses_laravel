<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyTerms extends Model
{
    use HasFactory;
    
    public $table = "policy_terms";

    protected $fillable =['description', 'type'];
}
