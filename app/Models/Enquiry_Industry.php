<?php

namespace App\Models;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

class Enquiry_Industry extends Model
{
    protected $table = 'enquiry_industry';
    protected $primaryKey = 'enquiry_industry_id';
   

    public static function validator(array $data, $enquiry_industry_id = '')
    {
        return Validator::make($data, [
            'industry_name' => 'required|max:255' ,
            'status' => 'required' ,
                   

        ]);
    }
}
