<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Product_Material;
use App\Models\Product_make;
use App\Models\Product_Quantity;
use App\Models\product_layer;
use App\Models\Product_MaterialQuantity;
use App\Models\Product_MaterialThickness;
use App\Models\Product_Material_ThicknessPrice;
use Datatables;
use DB;

class Product_MaterialController extends Controller
{
    public function getIndex() 
    {
    	return view('admin.ProductMaterial.Product_Material_index');
    }

    public function getCreate()
	{
		$Product_layer= product_layer::all();
		$product_quantity= Product_Quantity::all();
		$product_make= Product_make::all();

        return view('admin.ProductMaterial.Product_Material_form',compact('product_make','product_quantity','Product_layer'));
	}

	
    public function getData() 
    {
      
       $deals = Product_Material::join('product_material_thickness','product_material.product_material_id','=','product_material_thickness.product_material_id')->select(['product_material.*','product_material_thickness.thickness']);


        return Datatables::of($deals)
        ->addColumn('product_material_id', function ($product_material) {
                return ' <input type="checkbox" class="sub_chk" data-id="'.$product_material->product_material_id.'" value="' . $product_material->product_material_id . '">';
                
            })       
            ->addColumn('status', function ($product_material) {
                if($product_material->status==1){
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$product_material->product_material_id.'" id="'.$product_material->product_material_id.'" checked>
                                    <label id="ac" class="onoffswitch-label" for="'.$product_material->product_material_id.'" status-id="'.$product_material->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
                else{
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$product_material->product_material_id.'" id="'.$product_material->product_material_id.'">
                                    <label id="ac" class="onoffswitch-label" for="'.$product_material->product_material_id.'" status-id="'.$product_material->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
            })

            ->addColumn('action', function ($product_material) {
                return '<a href="'. action('Admin\Product\Product_MaterialController@getEdit', [$product_material->product_material_id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;' .
                    '<a  href="'. action('Admin\Product\Product_MaterialController@getDelete', [$product_material->product_material_id]) .'" data-id="'. $product_material->product_material_id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                
            })
            ->make(true);       
    }

   public function getEdit($product_material = '') {
       $product_material = Product_Material::leftjoin('product_material_thickness','product_material.product_material_id','=','product_material_thickness.product_material_id')->leftjoin('product_material_thickness_price','product_material_thickness.product_material_id','=','product_material_thickness_price.product_material_id')->select('product_material.*','product_material_thickness.*','product_material_thickness_price.*')->findOrFail($product_material);
        $Product_layer= product_layer::all();
        $product_make= Product_make::all();
        $product_quantity= Product_Quantity::all();
        $qty= Product_MaterialQuantity::all();
        $thk= Product_MaterialThickness::all();
        //print_r($thk);die;
        //$price= Product_Material_ThicknessPrice::all()


        $price= Product_Material_ThicknessPrice::all();
        
     //     $price['thickness_form'] = trim($price['thickness_form']);
     // $price['thickness_to'] = trim($price['thickness_to']);
     // $price['thickness_price'] = trim($price['thickness_price']);


        // $product_material = Product_Material::join('product_material_thickness','product_material.product_material_id','=','product_material_thickness.product_material_id')
        //     ->join('product_material_thickness_price','product_material.product_material_id','=','product_material_thickness_price.product_material_id')
        //     ->select('product_material.*','product_material_thickness_price.*','product_material_thickness.*')->get();

        
        //print_r($product_material);die;
        return view('admin.ProductMaterial.Product_Material_form', compact('Product_layer','product_make','product_quantity','product_material','qty','thk','price','from','to','gusset',''))->with('success');

         
    }

     public function getDelete($product_material) {
        try
        {
            $product_material = Product_Material::findOrFail($product_material);
            $product_material->delete();
            return redirect(action('Admin\Product\Product_MaterialController@getIndex'))->with('success');
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

    public function anyData1(Request $request)
    {
        $product_material = Product_Material::findOrFail($request->get("product_material_id"));
        $product_material->product_material_id = $request->get("product_material_id");
        $product_material->status = $request->get("status");
        $product_material->save();

        return redirect(action('Admin\Product\Product_MaterialController@getIndex'))->with('success');
    }
    
    public function getRemove(Request $request) 
    {
        try
        {
            $ids = $request->ids;       
            $del=Product_Material::whereIn('product_material_id',explode(",",$ids));
            $del->delete();
            return response()->json(['success'=>"Product Material Deleted successfully."]);
            
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }      
    }

    public function anyActiveall(Request $request)
    {
        $ids=$request->ids;
        $status=$request->get("status");
        DB::table("product_material")->whereIn('product_material_id',explode(",", $ids))->update(['status'=> $status]);
        
        return response()->json(['success'=>"Status Changed Successfully."]);

    }

    public function anyInactiveall(Request $request)
    {
        $ids=$request->ids;
        $status=$request->get("status");
        DB::table("product_material")->whereIn('product_material_id',explode(",", $ids))->update(['status'=> $status]);

        return response()->json(['success'=>"Status Changed Successfully."]);
    }

}
