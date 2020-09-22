<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Craf extends Model
{
    protected $guarded = ['id']   ;

    protected $fillable = [
        'person_id'
    ];
}
