<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hours extends Model
{
    protected $fillable = ['day', 'openTime', 'closeTime', 'isOpen'];
}
