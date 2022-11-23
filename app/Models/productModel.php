<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';

    protected $fillable = ['name'];

}
