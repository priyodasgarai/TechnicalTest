<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class import extends Model
{
    //
    protected $fillable = [
        'lot_no', 'price', 'status','phase'
    ];
}
