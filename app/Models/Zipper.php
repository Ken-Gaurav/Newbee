<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Zipper extends Model
{
   	use SoftDeletes;

    protected $table = 'zipper';
    protected $primaryKey = 'zipper_id';

    protected $dates = ['deleted_at'];
}


