<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'cro_countrys';
    public $timestamps = false;

    protected $casts = [
        'id' => 'string'
    ];
}
