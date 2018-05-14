<?php

namespace App\Http\Controllers\Admin\Template;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Template_measurement;
use Datatables;
use DB;

class Template_MeasurementController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function getIndex() 
    {
    	return view('admin.Template.TemplateMeasurement.Template_Measurement_index');
    }

    public function getCreate()
	{
     	return view('admin.Template.TemplateMeasurement.Template_Measurement_form');
	}

	public function postSave(Request $request) {

        $template_measurement = Auth::user();
        $validator = Template_measurement::validator($request->all(), $request->get("product_id", ''));
        
        if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());
        }
      
        if($request->get("product_id") == '') {
            $template_measurement = new Template_measurement();
        } else {
            $template_measurement = Template_measurement::findOrFail($request->get("product_id"));
        }
        $template_measurement->measurement = $request->get('measurement');  
        $template_measurement->status = $request->get("status");        
        $template_measurement->save();
       return redirect(action('Admin\Template\Template_MeasurementController@getIndex'))->with('success');
        
    }

    public function getData() {
        return Datatables::of(Template_measurement::all('*'))
        ->addColumn('product_id', function ($template_measurement) {
                return ' <input type="checkbox" class="sub_chk"  data-id="' . $template_measurement->product_id . '"  value="' . $template_measurement->product_id . '">';
                
            })
        
            ->addColumn('status', function ($template_measurement)
            {
                if($template_measurement->status==1){
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$template_measurement->product_id.'" id="'.$template_measurement->product_id.'" checked>
                                    <label id="ac" class="onoffswitch-label" for="'.$template_measurement->product_id.'" status-id="'.$template_measurement->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
                else{
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$template_measurement->product_id.'" id="'.$template_measurement->product_id.'">
                                    <label id="ac" class="onoffswitch-label" for="'.$template_measurement->product_id.'" status-id="'.$template_measurement->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
            })
           
            ->addColumn('action', function ($template_measurement) {
                return '<a href="'. action('Admin\Template\Template_MeasurementController@getEdit', [$template_measurement->product_id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;' .
                    '<a  href="'. action('Admin\Template\Template_MeasurementController@getDelete', [$template_measurement->product_id]) .'" data-id="'. $template_measurement->product_id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                
            })
            ->make(true);
            
          
    }

    public function getDelete($template_measurement) {
        try
        {
            $template_measurement = Template_measurement::findOrFail($template_measurement);
            $template_measurement->delete();
            return redirect(action('Admin\Template\Template_MeasurementController@getIndex'))->with('success');
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }
    }

    public function getEdit($template_measurement = '') 
    {
        $template_measurement = Template_measurement::findOrFail($template_measurement);   
             
        return view('admin.Template.TemplateMeasurement.Template_Measurement_form', compact('template_measurement', ''))->with('success');
    }

    public function getRemove(Request $request) 
    {
        try
        {
            $ids = $request->ids;       
            $del=Template_measurement::whereIn('product_id',explode(",",$ids));
            $del->delete();
            return response()->json(['success'=>"Product Deleted successfully."]);
            //return redirect(action('Admin\Product\ColorcategoryController@getIndex'))->with('success');
           
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }      
    }

    public function anyStatus(Request $request)
    {
        $template_measurement = Template_measurement::findorFail($request->get("product_id"));
        $template_measurement->product_id = $request->get("product_id");
        $template_measurement->status = $request->get("status");
        $template_measurement->save();

        return response()->json(['success'=>"Status Change Successfully."]);

    }

    public function anyActiveall(Request $request) 
    {
        $ids = $request->ids;
        $status = $request->get("status"); 
        DB::table("template_measurement")->whereIn('product_id',explode(",",$ids))->update(['status' => $status]);
       
        return response()->json(['success'=>"Status change  successfully."]);     
    }

    public function anyInactiveall(Request $request) 
    {
        $ids = $request->ids;
        $status = $request->get("status"); 
        DB::table("template_measurement")->whereIn('product_id',explode(",",$ids))->update(['status' => $status]);

        return response()->json(['success'=>"Status change  successfully."]);
    }

}
