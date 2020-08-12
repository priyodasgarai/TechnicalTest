<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
     protected $table = 'posts';
     
     protected $fillable = [
        'lot_no', 'price', 'status','phase'
    ];
}
