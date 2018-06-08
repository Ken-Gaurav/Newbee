<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product_volume extends Model
{
    use SoftDeletes;

    protected $table = 'product_volume';
    protected $primaryKey = 'product_volume_id';

    protected $dates = ['deleted_at'];

 	
    public function measurement()
    {
        return $this->belongsTo('App\Models\Template_measurement','primary_measurement_id','product_id');
    }

  
}

