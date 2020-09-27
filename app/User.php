<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cpf', 'email', 'password','rg', 'admin', 'client'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setAdminAttribute($value)
    {
        $this->attributes['admin'] = ($value === true || $value === '1' ? 1 : 0);
    }

    public function setClientAttribute($value)
    {
        $this->attributes['client'] = ($value === true || $value === '1' ? 1 : 0);
    }

    public function getLastLoginAtAttribute($value)
    {
        return $value ? date("d/m/Y H:i:s", strtotime($value)): 'N/A';
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? date("d/m/Y H:i:s", strtotime($value)): null;
    }



}
