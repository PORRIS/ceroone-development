<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'cro_contacts';
    protected $fillable = [
        'id',
        'name',
        'email',
        'billAddress'
        ];
    protected $casts = [
        'id' =>'integer'
        ];
}
