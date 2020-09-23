<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'person_id',
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
    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }
    public function serialApplication(): string
    {
        return "{$this->ident_key} / {$this->ident_ano}";
    }

    public function applicant()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function getReportAttribute($value)
    {
        if ($value == 0){
            echo '<b style="color: blue">EM ANÁLISE</b>';
        }
        if ($value == 1){
            echo '<b style="color: green">DEFERIDO</b>';
        }
        if ($value == 2){
            echo '<b style="color: red">INDEFERIDO</b>';
        }
    }



}