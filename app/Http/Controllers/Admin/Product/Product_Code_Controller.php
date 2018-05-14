<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Datatables;
use DB;
use App\Models\Product_model;
use App\Models\Spout_PouchModel;
use App\Models\zipper_price;
use App\Models\Template_measurement;
use App\Models\Product_make;
use App\Models\Pouch_color;


class Product_Code_Controller extends Controller
{
     public function __construct()
  {
        $this->middleware('auth');
  }

  public function getIndex()
	{
    $product=Product_model::all('*');
		return view('admin.ProductCode.product_code_index',compact('product'));
	}

public function getData()
	{
		$spout_pouch=Product_model::all('*');
		//$deals = Product_model::leftjoin('spout_pouch_size_master','product.product_id','=','spout_pouch_size_master.product_id')->select(['spout_pouch_size_master.product_id','product.product_name','product.product_id'])->get();
        
        return Datatables::of($spout_pouch)		
                    
            ->addColumn('action', function ($spout_pouch) {
                return '<a href="'. action('Admin\Product\SpoutPouch_SizeController@getEdit', [$spout_pouch->product_id]) .'"  class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;';
                
            })
            ->make(true);
	}
    public function getCreate()
  {
    $product= Product_model::all();
        
        $test=[];
    foreach ($product as $product) {
        $test[$product->abbrevation]=$product->product_name;
    }


    $zipper= zipper_price::all();
        
        $zip=[];
    foreach ($zipper as $zipper) {
        $zip[$zipper->zipper_abbr]=$zipper->zipper_name;
    }
    $measurement=Template_measurement::pluck('measurement','product_id')->toArray();
    $make_pouch=Product_make::pluck('make_name','abbr')->toArray();
    $Pouch_color=Pouch_color::pluck('color','pouch_color_abbr')->toArray();
    
      //$product= Product_model::pluck('product_name','product_id')->toArray();
     return view('admin.ProductCode.product_code_form',compact('test','zip','measurement','make_pouch','Pouch_color'));
  
  }
}
