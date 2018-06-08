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
use App\Models\Printingeffect;
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
        $printing_Effect= Printingeffect::all();

        return view('admin.ProductMaterial.Product_Material_form',compact('product_make','product_quantity','Product_layer','printing_Effect'));
    }

    public function postSave(Request $request)
    {
         

        $product_material = Auth::user();
        /*$validator = Product_Material::validator($request->all(), $request->get("product_material_id", ''));
        
        if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());
        }
      */
        if($request->get("product_material_id") == '') {
            $product_material = new Product_Material();
        } else {
            $product_material = Product_Material::findOrFail($request->get("product_material_id"));
        }



        //$product_material->product_material_id = $request->get("product_material_id",'');
        $product_material->material_name = $request->get("material_name");

        if($request->get("layers") != null)
        $product_material->layers = implode(",",$request->get("layers"));

        $product_material->gsm = $request->get("gsm");
        $product_material->minimum_product_quo = $request->get("minimum_product_quo");

         if($request->get("thickness") != null)
        $product_material->thickness = implode("|",$request->get("thickness"));

         if($request->get("printing_effect") != null)
        $product_material->printing_effect = implode(",",$request->get("printing_effect"));

         if($request->get("make_pouch") != null)
        $product_material->make_pouch = implode(",",$request->get("make_pouch"));

         if($request->get("quantity") != null)
        $product_material->quantity = implode(",",$request->get("quantity"));

        $product_material->material_unit = $request->get("material_unit");
        $product_material->status = $request->get("status");
       
        $product_material->save();



        $product_material->product_material_thickness_id = $request->get("product_material_thickness_id");
       
        $product_material->thickness_form = $request->get("thickness_form");
        $product_material->thickness_to = $request->get("thickness_to");
        $product_material->thickness_price = $request->get("thickness_price");
       


          $count=count($request->get('thickness_form'));

           for($i = 0; $i <$count; $i++){
            $get_latest_id=Product_Material::latest()->first();
            if($request->get("product_material_id") == ''){
                   
                     $thickness_price = array(
                'product_material_id' =>$get_latest_id->product_material_id,
                'thickness_form' => $product_material->thickness_form [$i],
                'thickness_to' => $product_material->thickness_to [$i],
                'thickness_price' => $product_material->thickness_price [$i],
                      );

            }else
            {
            
                         if($product_material->product_material_thickness_id[$i] != ""){
                        $thickness_price = array(
                            
                            'thickness_form' => $product_material->thickness_form [$i],
                            'thickness_to' => $product_material->thickness_to [$i],
                            'thickness_price' => $product_material->thickness_price [$i],
                         );
                    }else{

                        $thickness_price = array(

                            'product_material_id' => $request->get("product_material_id"),
                            'thickness_form' => $product_material->thickness_form [$i],
                            'thickness_to' => $product_material->thickness_to [$i],
                            'thickness_price' => $product_material->thickness_price [$i],
                         );

                    }
            }

            
    
         if($product_material->product_material_thickness_id[$i] == "")
            {    
                
             Product_Material_ThicknessPrice::create($thickness_price);
            }
          else 
            {
              
             Product_Material_ThicknessPrice::where('product_material_thickness_id',$product_material->product_material_thickness_id [$i])->update($thickness_price);
            }
        }



       
       return redirect(action('Admin\Product\Product_MaterialController@getIndex'))->with('success');
    }

    public function getData() 
    {
      
       $product_material = Product_Material::all();


        return Datatables::of($product_material)
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
       $product_material_data = Product_Material::findOrFail($product_material);
       $product_material_thickness_data=Product_Material_ThicknessPrice::where('product_material_id',$product_material)->get();
       
        $Product_layer= product_layer::all();
        $product_quantity= Product_Quantity::all();
        $product_make= Product_make::all();
        $printing_Effect= Printingeffect::all();
        
   
        return view('admin.ProductMaterial.Product_Material_form', compact('Product_layer','product_make','product_quantity','printing_Effect','product_material_data','product_material_thickness_data'))->with('success');

         
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
        $product_material_thickness_id=$request->thicknessprice_id;
        if(!empty($product_material_thickness_id))
        $data = Product_Material_ThicknessPrice::find($product_material_thickness_id)->delete();
       
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
