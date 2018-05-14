<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','user_type_id', 'email', 'password','textpassword',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function AdminUsers(){
        return $this->hasMany(Models\user_personal_detail::class);
    }

    public function Employess(){
        return $this->hasMany(Models\Employees::class);
    }

    
}
