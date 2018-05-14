<?php

namespace App\Models;
use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;
use Validator;

class user_personal_detail extends Model
{
    protected $table = 'user_personal_details';
    protected $primaryKey = 'user_personal_details_id';
    protected $fillable = ['user_id','company_logo','first_name','last_name','telephone','postal_code','state','city','country_id','status','is_delete'];

    public static function validator(array $data, $user_personal_details_id = '')
    {
        return Validator::make($data, [
            
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'telephone' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'state' => 'required|max:255',
            'city' => 'required|max:255'
        ]);
    }
}
