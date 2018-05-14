<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
class pouch_style extends Model
{
    protected $table = 'pouch_style';
    protected $primaryKey = 'pouch_style_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'style','status','is_delete'
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
    public static function validator(array $data, $pouch_style = '')
    {
        return Validator::make($data, [
            'style' => 'required|max:255'           

        ]);
    }
}

