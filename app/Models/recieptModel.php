<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recieptModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'reciept';

    protected $fillable = [
        'title',
        'description',
    ];

}
