<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    protected $fillable = [
        'date_due',
        'name',
        'value',
        'done'
    ];
}
