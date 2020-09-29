<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;

class Person extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $guarded = ['id'];

    protected $fillable = [
        'rg',
        'cpf',
        'first_name',
        'last_name',
        'email',
        'date_of_birth',
        'phone',
        'address',
        'number',
        'neighborhood',
        'city',
        'state',
        'zipcode',
        'posto'

    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDateOfBirthAttribute($value)
    {
        return $value ?  date('d/m/Y', strtotime($value)) : 'Sem informação';
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? date('d/m/Y H:i:s', strtotime($value)): 'N/A';
    }

    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
    public function applications()
    {
        return $this->hasMany(Application::class, 'person_id', 'id');
    }


}
