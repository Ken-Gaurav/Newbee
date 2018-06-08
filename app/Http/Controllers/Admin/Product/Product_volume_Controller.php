<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Template_measurement;
use App\Models\Product_volume;
use Datatables;

class Product_volume_Controller extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
   public function getIndex() 
    {
        //$volumedata=Product_volume::with('measurement')->get();
       // dd($volumedata);
        return view('admin.Product.product_volume.Product_volume_index',compact('volumedata'));
    }

    public function getCreate()
	{
       
        
        $measurement=Template_measurement::pluck('measurement','product_id')->toArray();
        return view('admin.Product.product_volume.Product_volume_form',compact('measurement'));
	}

	public function getData() {   
      //  
        return Datatables::of(Product_volume::with('measurement')->get())
            ->addColumn('product_volume_id', function ($Product_volume) {
                return ' <input type="checkbox" class="sub_chk"  data-id="' . $Product_volume->product_volume_id . '"  value="' . $Product_volume->product_volume_id . '">';
            })
            ->addColumn('measure', function ($Product_volume)
             {
                return $Product_volume->measurement()->first()->measurement;
             })   
            ->addColumn('status', function ($Product_volume)
            {
                if($Product_volume->status==1){
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$Product_volume->measurement()->first()->measurement.'" id="'.$Product_volume->product_volume_id.'" checked>
                                    <label id="ac" class="onoffswitch-label" for="'.$Product_volume->product_volume_id.'" status-id="'.$Product_volume->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
                else{
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$Product_volume->product_volume_id.'" id="'.$Product_volume->product_volume_id.'">
                                    <label id="ac" class="onoffswitch-label" for="'.$Product_volume->product_volume_id.'" status-id="'.$Product_volume->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
            })
            
            ->addColumn('action', function ($Product_volume) {
                return '<a href="'. action('Admin\Product\Product_volume_Controller@getEdit', [$Product_volume->product_volume_id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;' .
                    '<a  href="'. action('Admin\Product\Product_volume_Controller@getDelete', [$Product_volume->product_volume_id]) .'" data-id="'. $Product_volume->product_volume_id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                
            })
            ->make(true);
            
          
    }

    public function postSave(Request $request) {

        $product_volume = Auth::user();
        
      
        if($request->get("product_volume_id") == '') {
            $product_volume = new Product_volume();
        } else {
            $product_volume = Product_volume::findOrFail($request->get("product_volume_id"));
        }
        $checkboxstatus= $request->get("checkboxstatus"); 
        
        $product_volume->volume = $request->get("volume"); 
        $product_volume->primary_measurement_id = $request->get("measurement"); 
        if($checkboxstatus==1){
        $product_volume->uk_volume = $request->get("uk_volume"); 
        $product_volume->secondary_measurement_id = $request->get("ukmeasurement"); 
        }
        $product_volume->status = $request->get("status");        
        $product_volume->save();
       return redirect(action('Admin\Product\Product_volume_Controller@getIndex'))->with('success');
        
    }


    public function getDelete($product_quantity) {
        try
        {
            $product_quantity = Product_Quantity::findOrFail($product_quantity);
            $product_quantity->delete();
            return redirect(action('Admin\Product\Product_QuantityController@getIndex'))->with('success');
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

	public function getEdit($product_volume = '') {

        $measurement=Template_measurement::pluck('measurement','product_id')->toArray();
        $product_volumed_data = Product_volume::findOrFail($product_volume);  
        
        return view('admin.Product.product_volume.Product_volume_form', compact('product_volumed_data','measurement'))->with('success');
    }

    public function anyData1(Request $request) {
         $product_quantity = Product_Quantity::findOrFail($request->get("product_quantity_id"));
         $product_quantity->product_quantity_id = $request->get("product_quantity_id");
         $product_quantity->status = $request->get("status");
         $product_quantity->save();
        return redirect(action('Admin\Product\Product_QuantityController@getIndex'))->with('success');      

    }

    public function getRemove(Request $request)
    {
        try
        {
            $ids = $request->ids;       
            $del=Product_Quantity::whereIn('product_quantity_id',explode(",",$ids));
            $del->delete();
            return response()->json(['success'=>"Product Deleted successfully."]);
           
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        } 
    }

    public function getActiveall(Request $request)
    {

        $ids = $request->ids;
        $status = $request->get("status"); 
        DB::table("product_quantity")->whereIn('product_quantity_id',explode(",",$ids))->update(['status' => $status]);
       
        return response()->json(['success'=>"Status change  successfully."]);
    }

    public function getInactiveall(Request $request)
    {
        $ids= $request->ids;
        $status=  $request->get("status");
        DB::table("product_quantity")->whereIn('product_quantity_id',explode(",",$ids))->update(['status' => $status]);

        return response()->json(['success'=>'Status change successfully.']);
    }
}
