<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_Material extends Model
{
     use SoftDeletes;

    protected $table = 'product_material';
    protected $primaryKey = 'product_material_id';
    
    /*public static function validator(array $data, $product_material_id = '')
    {
        return Validator::make($data, [
           'layer' => 'required|max:255' ,
                        

        ]);
    }    */
      protected $dates = ['deleted_at'];
}
