<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingridientModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ingridients';
   
   
    protected $fillable = [
        'id_product',
        'id_reciept',
    ];
}
