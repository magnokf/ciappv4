<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;

class Application extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
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
        'nf',
        'gru',
        'anexo_c',
        'craf',
        'closed'

    ];

    public function getCreatedAtAttribute($value)
    {
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

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }


}
