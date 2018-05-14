<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu_permission extends Model
{
    protected $table = 'menu_permission';
    protected $primaryKey = 'menu_permission_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id','user_id','user_type_id','status','is_delete'
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
    public static function validator(array $data, $color_category_id = '')
    {
        return Validator::make($data, [
            'menu_id' => 'required',
            'user_id' => 'required',
            'user_type_id' => 'required'
				

        ]);
    }
}
