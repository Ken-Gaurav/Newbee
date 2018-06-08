<?php

namespace App\Models;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';
    protected $primaryKey = 'product_id';

    protected $dates = ['deleted_at'];

    public static function validator(array $data, $product_id = '')
    {
        return Validator::make($data, [
           'product_name' => 'required',
           'abbrevation' => 'required',
          ]);
    }
}
