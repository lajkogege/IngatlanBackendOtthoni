<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingatlan extends Model
{
    protected $fillable=[
        'id',
        'kategoria',
        'leiras',
        'hirdetesDatuma',
        'tehermentes',
        'ar'
    ];
}
