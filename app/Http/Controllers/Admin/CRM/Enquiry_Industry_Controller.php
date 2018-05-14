<?php

namespace App\Http\Controllers\Admin\CRM;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Datatables;
use App\menu_permission;
use App\Models\Enquiry_Industry;
use DB;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use App\role_permission_model;

class Enquiry_Industry_Controller extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function getIndex() 
    {
	    	return view('admin.Crm.Enquiry_Industry.Enquiry_Industry_Index');
    }

    public function getCreate()
	{
		
		return view('admin.Crm.Enquiry_Industry.Enquiry_Industry_Form');
	}

   	public function getData()
 	{  
         $Enquiry_Industry_Data=Enquiry_Industry::where('is_delete','0')->get();
            return Datatables::of($Enquiry_Industry_Data)  
           
        ->addColumn('enquiry_industry_id', function ($Enquiry_Industry_Data) {
                return ' <input type="checkbox" class="sub_chk"  data-id="' . $Enquiry_Industry_Data->enquiry_industry_id . '"  value="' . $Enquiry_Industry_Data->enquiry_industry_id . '">';
                
            })

        ->addColumn('status', function ($Enquiry_Industry_Data) {
                if($Enquiry_Industry_Data->status==1){
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$Enquiry_Industry_Data->enquiry_industry_id.'" id="'.$Enquiry_Industry_Data->enquiry_industry_id.'" checked>
                                    <label id="ac" class="onoffswitch-label" for="'.$Enquiry_Industry_Data->enquiry_industry_id.'" data-id="'.$Enquiry_Industry_Data->enquiry_industry_id.'" status-id="'.$Enquiry_Industry_Data->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
                else{
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$Enquiry_Industry_Data->enquiry_industry_id.'" id="'.$Enquiry_Industry_Data->enquiry_industry_id.'">
                                    <label id="ac" class="onoffswitch-label" data-id="'.$Enquiry_Industry_Data->enquiry_industry_id.'" for="'.$Enquiry_Industry_Data->enquiry_industry_id.'" status-id="'.$Enquiry_Industry_Data->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
        })

        ->addColumn('action', function ($Enquiry_Industry_Data) {
                return '<a href="'. action('Admin\CRM\Enquiry_Industry_Controller@getEdit', [$Enquiry_Industry_Data->enquiry_industry_id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;' .
                    '<a  href="'. action('Admin\CRM\Enquiry_Industry_Controller@getDelete', [$Enquiry_Industry_Data->enquiry_industry_id]) .'" data-id="'. $Enquiry_Industry_Data->enquiry_industry_id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                
        })
        ->make(true);

    }
	
    public function postSave(Request $request) 
    {

        $enquiry_industry = Auth::user();
        $validator = Enquiry_Industry::validator($request->all(), $request->get("enquiry_industry_id", ''));
        
        if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());
        }
      
        if($request->get("enquiry_industry_id") == '') {
            $enquiry_industry = new Enquiry_Industry();
        } else {
            $enquiry_industry = Enquiry_Industry::findOrFail($request->get("enquiry_industry_id"));
        }
        $enquiry_industry->industry_name = $request->get("industry_name");
        $enquiry_industry->status = $request->get("status");   

        
        $enquiry_industry->save();
       return redirect(action('Admin\CRM\Enquiry_Industry_Controller@getIndex'))->with('success');
        
    }
    public function getEdit($enquiry_industry_id = '') 
    {
        $enquiry_industry_details = Enquiry_Industry::findOrFail($enquiry_industry_id);  
        
        return view('admin.Crm.Enquiry_Industry.Enquiry_Industry_Form', compact('enquiry_industry_details'))->with('success');
    }

     public function getDelete($enquiry_industry_id)
    {
         try
        {
      
        $enquiry_industry = Enquiry_Industry::findOrFail($enquiry_industry_id)->update(['is_delete'=>1])->save();
         return redirect(action('Admin\CRM\Enquiry_Industry_Controller@getIndex'))->with('success');
           
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }

    }
}
