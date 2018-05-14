<?php

namespace App\Http\Controllers\Admin\CRM;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Datatables;
use App\menu_permission;
use App\Models\Enquiry_Source;
use DB;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use App\role_permission_model;


class Enquiry_Source_Controller extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function getIndex() 
    {
	    	return view('admin.Crm.Enquiry_Source.Enquiry_Source_Index');
    }

    public function getCreate()
	{
		
		return view('admin.Crm.Enquiry_Source.Enquiry_Source_Form');
	}

   	public function getData()
 	{  
         $Enquiry_Source=Enquiry_Source::where('is_delete','0')->get();
            return Datatables::of($Enquiry_Source)  
           
        ->addColumn('enquiry_source_id', function ($Enquiry_Source) {
                return ' <input type="checkbox" class="sub_chk"  data-id="' . $Enquiry_Source->enquiry_source_id . '"  value="' . $Enquiry_Source->enquiry_source_id . '">';
                
            })

        ->addColumn('status', function ($Enquiry_Source) {
                if($Enquiry_Source->status==1){
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$Enquiry_Source->enquiry_source_id.'" id="'.$Enquiry_Source->enquiry_source_id.'" checked>
                                    <label id="ac" class="onoffswitch-label" for="'.$Enquiry_Source->enquiry_source_id.'" data-id="'.$Enquiry_Source->enquiry_source_id.'" status-id="'.$Enquiry_Source->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
                else{
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$Enquiry_Source->enquiry_source_id.'" id="'.$Enquiry_Source->enquiry_source_id.'">
                                    <label id="ac" class="onoffswitch-label" data-id="'.$Enquiry_Source->enquiry_source_id.'" for="'.$Enquiry_Source->enquiry_source_id.'" status-id="'.$Enquiry_Source->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
        })

        ->addColumn('action', function ($Enquiry_Source) {
                return '<a href="'. action('Admin\CRM\Enquiry_Source_Controller@getEdit', [$Enquiry_Source->enquiry_source_id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;' .
                    '<a  href="'. action('Admin\CRM\Enquiry_Source_Controller@getDelete', [$Enquiry_Source->enquiry_source_id]) .'" data-id="'. $Enquiry_Source->enquiry_source_id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                
        })
        ->make(true);

    }
	
    public function postSave(Request $request) 
    {

        $Enquiry_Source = Auth::user();
        $validator = Enquiry_Source::validator($request->all(), $request->get("enquiry_source_id", ''));
        
        if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());
        }
      
        if($request->get("enquiry_source_id") == '') {
            $Enquiry_Source = new Enquiry_Source();
        } else {
            $Enquiry_Source = Enquiry_Source::findOrFail($request->get("enquiry_source_id"));
        }
        $Enquiry_Source->enquiry_name= $request->get("enquiry_name");
        $Enquiry_Source->status = $request->get("status");   

        
        $Enquiry_Source->save();
       return redirect(action('Admin\CRM\Enquiry_Source_Controller@getIndex'))->with('success');
        
    }
    public function getEdit($enquiry_source_id = '') 
    {
        $Enquiry_Source = Enquiry_Source::findOrFail($enquiry_source_id);  
        
        return view('admin.Crm.Enquiry_Source.Enquiry_Source_Form', compact('Enquiry_Source'))->with('success');
    }

     public function getDelete($enquiry_source_id)
    {
         try
        {
      
        $Enquiry_Source = Enquiry_Source::findOrFail($enquiry_source_id)->update(['is_delete'=>1])->save();
         return redirect(action('Admin\CRM\Enquiry_Source_Controller@getIndex'))->with('success');
           
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }

    }
}
