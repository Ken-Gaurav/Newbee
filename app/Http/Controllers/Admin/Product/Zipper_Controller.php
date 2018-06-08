<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Datatables;
use App\Http\Requests;
use App\Models\Zipper;
use App\Http\Controllers\Controller;


class Zipper_Controller extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
  
   public function getIndex()
    {
    	return view('admin.Product.quotation_pricing.Zipper.Zipper_index');
    }
    public function getCreate()
	{
 	    return view('admin.Product.quotation_pricing.Zipper.Zipper_form');
  	}

	public function postSave(Request $request) {

        $zipper = Auth::user();
        
      
        if($request->get("zipper_id") == '') {
            $zipper = new Zipper();
        } else {
            $zipper = Zipper::findOrFail($request->get("zipper_id"));
        }
        $zipper->zipper_name = $request->get("zipper_name"); 
 		$zipper->zipper_abbrevation = $request->get("zipper_abbrevation"); 
 		$zipper->status = $request->get("status");        
        $zipper->save();
       return redirect(action('Admin\Product\Zipper_Controller@getIndex'))->with('success');
        
    }

    public function getData() {
        return Datatables::of(Zipper::all('*'))
      	 ->addColumn('zipper_id', function ($zipper) {
                return ' <input type="checkbox" class="sub_chk" data-id="'.$zipper->zipper_id.'"  value="' . $zipper->zipper_id . '">';
                
            })

         ->addColumn('status', function ($zipper) {
                if($zipper->status==1){
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$zipper->zipper_id.'" id="'.$zipper->zipper_id.'" checked>
                                    <label id="ac" class="onoffswitch-label" for="'.$zipper->zipper_id.'" status-id="'.$zipper->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
                else{
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$zipper->zipper_id.'" id="'.$zipper->zipper_id.'">
                                    <label id="ac" class="onoffswitch-label" for="'.$zipper->zipper_id.'" status-id="'.$zipper->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
        })
        
        ->addColumn('action', function ($zipper) {
                return '<a href="'. action('Admin\Product\zipper_price_controller@getEdit', [$zipper->zipper_id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;' .
                    '<a  href="'. action('Admin\Product\zipper_price_controller@getDelete', [$zipper->zipper_id]) .'" data-id="'. $zipper->zipper_id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                
            })
            ->make(true);
            
          
    } 
}
