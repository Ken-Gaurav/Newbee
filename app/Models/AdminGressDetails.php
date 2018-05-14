<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;


class AdminGressDetails extends Model
{
    protected $table = 'admin_gress_details';
    protected $primaryKey = 'admin_gress_details_id';
    
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
    public static function validator(array $data, $admin_gress_details_id = '')
    {
        return Validator::make($data, [
            
           
            'gst_for_invoice' => 'required',
            'company_address' => 'required',
            'bank_address' => 'required',
            'email_signature' => 'required',
            'valve_price' => 'required',
            'allow_currency_selection' => 'required',
            'send_email_with_gress_price' => 'required',
            'Stock_Order_Quantity_For_Price' => 'required',
            'multi_quotation_price' => 'required',
            'stock_order_price' => 'required',
            'primary_currency' => 'required',
            'secondary_currency' => 'required',
            'product_currency_rate' => 'required',
            'cylinder_currency_rate' => 'required',
            'tool_currency_rate' => 'required',
        ]);
    }
}
