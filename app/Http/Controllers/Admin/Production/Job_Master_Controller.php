<?php

namespace App\Http\Controllers\Admin\Production;

use App\Models\employee_model;
use App\Models\Job_Master_Model;
use App\Models\Printingeffect;
use App\Models\Product_Material;
use App\Models\Product_model;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\product_layer;
use App\Models\product_item_info_model;
use App\Models\Product_Category_Model;	
use App\Models\Production_Process_Model;
use App\Models\Size_master_model;


class Job_Master_Controller extends Controller
{
    
	public function getIndex()
    {
        return view('admin.Production.Job_Master.Job_Master_Index');
    }

    public function getCreate($layers='')
    {



        $job=Job_Master_Model::where('is_delete','0' AND 'status','1')->orderBy('job_id','desc')->get();

        //print_r($job);die;
        $country=Country::pluck('country_name','country_id')->toArray();
        $product= Product_model::pluck('product_name','product_id')->toArray();
        $layer= product_layer::pluck('layer','product_layer_id')->toArray();
        $user= employee_model::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"),'employee_id')
            ->pluck('name','employee_id')
            ->toArray();
        // $size= Size_master_model::leftjoin('product','size_masters.product_id','=','product.product_id')->select(DB::raw("CONCAT(size_masters.volume,'[',size_masters.width,'X',size_masters.height,'X',size_masters.gusset,']') AS name"),'size_masters.size_master_id')
        //         ->pluck('name','size_masters.size_master_id')
        //         ->toArray();
        // print_r($size);die;

        $ptr=Printingeffect::pluck('effect_name','printing_effect_id')->toArray();

        
        $material=product_item_info_model::pluck('product_name','layer_id','product_item_id')->toArray();
        
     
        $process=Production_Process_Model::where('production_process_id','=','7')->orwhere('production_process_id','=','8')->pluck('production_process_name','production_process_id')->toArray();

        //$Product_Material=product_item_info_model::all();

        return view('admin.Production.Job_Master.Job_Master_add',['process'=>$process,'material'=>$material,'user'=>$user,'country'=>$country,'product'=>$product,'ptr'=>$ptr,'layer'=>$layer,'data'=>$job]);
    }

    public function getMaterial($layers)
    {
        $material=product_item_info_model::pluk('product_name','layer')->where('layer','=',$layers)->all();
    }

    public function getAjax($id)
    {
        
        $size= Size_master_model::join('product','size_masters.product_id','=','product.product_id')->select(DB::raw("CONCAT(size_masters.volume,'[',size_masters.width,'X',size_masters.height,'X',size_masters.gusset,']') AS name"),'size_masters.size_master_id')->where('size_masters.product_id',$id)
                ->pluck('name','size_masters.size_master_id')
                ->toArray();
        //print_r($size);die;
        //$subchild = admin_menu::where("parent_id",$id)->pluck("title","admin_id");
        return json_encode($size);
          }
}
