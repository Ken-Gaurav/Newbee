<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;  
class user_type extends Model
{
	protected $table = 'user_type';
    protected $primaryKey = 'user_type_id';
    
    protected $fillable = [
        'name', 'status','is_delete'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public static function validator(array $data, $user_type_id = '')
    {
        return Validator::make($data, [
          
            'name' => 'required' ,
        ]);
    }
}
