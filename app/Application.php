<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = ['id','person_id'];
    protected $fillable = [
        'ident_key',
        'ident_ano',
        'sei',
        'report',
        'nota_def_cbmerj',
        'nota_sigma_cbmerj',
        'nota_craf_cbmerj',
        'doc1',
        'doc2',
        'doc3',
        'craf',
        'closed'

    ];
    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function serialApplication(): string
    {
        return "{$this->ident_key} / {$this->ident_ano}";
    }

}
