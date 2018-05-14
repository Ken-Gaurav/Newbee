<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;
class AdminGressPercentageDetails extends Model
{
    protected $table = 'admin_gress_percentage';
    protected $primaryKey = 'admin_gress_percentage_id';
    protected $fillable = ['user_id','admin_gress_details_id','quantity','by_factory','by_air','by_sea'];
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
    public static function validator(array $data, $admin_gress_percentage_id = '')
    {
        return Validator::make($data, [
         
            'quantity_Factory_price' => 'required',
            'quantity_Air_price' => 'required',
            'quantity_Sea_price' => 'required',
            
        ]);
    }
}
