<?php

namespace App\Models;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

class Enquiry_Source extends Model
{
     protected $table = 'enquiry_source';
    protected $primaryKey = 'enquiry_source_id';
   

    public static function validator(array $data, $enquiry_source_id = '')
    {
        return Validator::make($data, [
            'enquiry_name' => 'required|max:255' ,
            'status' => 'required' ,
                   

        ]);
    }
}
