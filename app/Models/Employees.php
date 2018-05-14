<?php

namespace App\Models;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

class Employees extends Model
{
     protected $table = 'employee_details';
    protected $primaryKey = 'employee_details_id';
    protected $fillable = ['user_id','parent_user_id','first_name','last_name','telephone','postal_code','city','state','country_id','email_signature','stock_order_price','multi_quotation_price','stock_price_compulsory','status'];

    public static function validator(array $data, $admin_id = '')
    {
        return Validator::make($data, [
            
           
            'parent_user_id' => 'required',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'telephone' => 'required|max:255',
            'postal_code' => 'required|max:255',
            'state' => 'required|max:255',
            'city' => 'required|max:255',
            'country_id' => 'required',
            'email_signature' => 'required',
            'stock_order_price' => 'required|',
            'multi_quotation_price' => 'required',
        ]);
    }


}
