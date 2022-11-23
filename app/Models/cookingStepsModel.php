<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cookingStepsModel extends Model
{
    use HasFactory;
  
    public $timestamps = false;
    protected $table = 'cooking_steps';
  
}
