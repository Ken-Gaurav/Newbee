<?php

namespace App;
use Validator;
use Illuminate\Database\Eloquent\Model;

class role_permission_model extends Model
{
    protected $table = 'role_permission';
    protected $primaryKey = 'role_permission_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id','user_type_id','add_permission','edit_permission','delete_permission','view_permission','status'
    ];
        /**
     *  The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /**
     * Get a validator for user.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    
    public static function validator(array $data, $role_permission_id = '')
    {
        return Validator::make($data, [
          
            'add_permission' => 'required' ,
           'edit_permission' => 'required' ,
           'delete_permission' => 'required' ,
           'view_permission' => 'required' ,
                        

        ]);
    }
}
