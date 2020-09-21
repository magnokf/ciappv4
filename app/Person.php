<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
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
        'zipcode'

    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDateOfBirthAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? date('d/m/Y H:i:s', strtotime($value)): 'N/A';
    }

    public function fullName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
