<?php

namespace App\Http\Controllers\Admin\Product;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;
use App\Http\Requests;
use Illuminate\Support\Collection;
use DB;
use App\Http\Controllers\Controller;

class product_controller extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
  
  
   public function getIndex()
    {
    	return view('admin.product.product.product_index');
    }
    public function getCreate()
	{
     return view('admin.product.product.product_form');
  	}

	public function postSave(Request $request) {

        $product = Auth::user();
        $validator = Product::validator($request->all(), $request->get("product_id", ''));
        
        if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());
        }
      
        if($request->get("product_id") == '') {
            $product = new Product();
        } else {
            $product = Product::findOrFail($request->get("product_id"));
        }
        $product->product_name =$request->get("product_name");
        $product->abbrevation = $request->get("abbrevation");
        $product->per_kg_price = $request->get("per_kg_price");
        $product->strip_thickness = $request->get("strip_thickness");
        $product->status = $request->get("status");
        $product->save();

       return redirect(action('Admin\Product\product_controller@getIndex'))->with('success');
        
    }

    public function getData() {
        return Datatables::of(Product::all('*'))
        ->addColumn('product_id', function ($product) {
                return ' <input type="checkbox" class="sub_chk" data-id="' . $product->product_id . '"  value="' . $product->product_id . '">';
            })
 
            ->addColumn('status', function ($product) {
                if ($product->status == 1) {
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$product->product_id.'" id="'.$product->product_id.'" checked>
                                    <label id="ac" class="onoffswitch-label" for="'.$product->product_id.'" status-id="'.$product->status.'" data-id="' . $product->product_id . '">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                    }
                    else{
                        return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$product->product_id.'" id="'.$product->product_id.'">
                                    <label id="ac" class="onoffswitch-label" for="'.$product->product_id.'" status-id="'.$product->status.'" data-id="' . $product->product_id . '">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                    }
            })
       
           
            ->addColumn('action', function ($product) {
                return '<a href="'. action('Admin\Product\product_controller@getEdit', [$product->product_id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;';
                
            })
            ->make(true);
            
          
    }
     
    public function getEdit($product = '',Request $request) 
    {
        $product = Product::findOrFail($product);
       
        return view('admin.product.product.product_form', compact('product'))->with('success');
    }
    public function getDelete($product) {
        try
        {
            $product = Product_model::findOrFail($product);
            $product->delete();
            return redirect(action('Admin\Product\product_controller@getIndex'))->with('success');
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }


     public function anyData1(Request $request) {
         $product = Product_model::findOrFail($request->get("product_id"));
         $product->product_id = $request->get("product_id");
         $product->status = $request->get("status");
         $product->save();
        return redirect(action('Admin\Product\product_controller@getIndex'))->with('success');      

    } 

    public function anyActiveall(Request $request) {

        $ids = $request->ids;
        $status = $request->get("status"); 
         DB::table("product")->whereIn('product_id',explode(",",$ids))->update(['status' => $status]);
       

         return response()->json(['success'=>"Status change  successfully."]);
       //return redirect(action('Admin\Product\ColorcategoryController@getIndex'))->with('success');      

    }

     public function anyInactiveall(Request $request) {
        
        $ids = $request->ids;
        $status = $request->get("status"); 
         DB::table("product")->whereIn('product_id',explode(",",$ids))->update(['status' => $status]);       
         return response()->json(['success'=>"Status change  successfully."]);
       //return redirect(action('Admin\Product\ColorcategoryController@getIndex'))->with('success');      

    }

    public function getRemove(Request $request) 
    {
         try
        {
            $ids = $request->ids;       
            $del=Product_model::whereIn('product_id',explode(",",$ids));
            $del->delete();
            return response()->json(['success'=>"Products Deleted successfully."]);
           
           
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }

           
    }

    

      
}
