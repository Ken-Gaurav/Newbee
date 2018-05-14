<?php

namespace App\Http\Controllers\Admin\InternationalBranch;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use App\role_permission_model;
use Datatables;
use App\menu_permission;
use App\user_type;
use DB;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use App\role_permission_model;

class Usertype_controller extends Controller
{
    //
	  public function __construct()
    {
        $this->middleware('auth');
    }
  
   
    public function getIndex() 
    {
		//$user=User::all();
            

    	return view('admin.InternationalBranch.UserTypes.User_Type_index');
    }

	
	
    public function getCreate()
	{
		
		return view('admin.InternationalBranch.UserTypes.User_Type_form');
	}

    public function getUserDetails(Request $request,$userid='',$menulist='')
    {
        $userinfo=User::findorFail($userid);
        return view('admin.InternationalBranch.user_Pricing_details',compact('userinfo'));

    }

	public function getData()
 	{  
         $user_type=user_type::where('is_delete','0')->get();
            return Datatables::of($user_type)  
           
        ->addColumn('user_type_id', function ($user_type) {
                return ' <input type="checkbox" class="sub_chk"  data-id="' . $user_type->user_type_id . '"  value="' . $user_type->user_type_id . '">';
                
            })

        ->addColumn('status', function ($user_type) {
                if($user_type->status==1){
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$user_type->user_type_id.'" id="'.$user_type->user_type_id.'" checked>
                                    <label id="ac" class="onoffswitch-label" for="'.$user_type->user_type_id.'" data-id="'.$user_type->user_type_id.'" status-id="'.$user_type->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
                else{
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$user_type->user_type_id.'" id="'.$user_type->user_type_id.'">
                                    <label id="ac" class="onoffswitch-label" data-id="'.$user_type->user_type_id.'" for="'.$user_type->user_type_id.'" status-id="'.$user_type->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
        })

        ->addColumn('action', function ($user_type) {
                return '<a href="'. action('Admin\InternationalBranch\Usertype_controller@getEdit', [$user_type->user_type_id]) .'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;' .
                    '<a  href="'. action('Admin\InternationalBranch\Usertype_controller@getDelete', [$user_type->user_type_id]) .'" data-id="'. $user_type->user_type_id . '" class="btn btn-xs btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</a>';
                
        })
        ->make(true);

    }
	
    public function postSave(Request $request) 
    {

        $usertypedetails = Auth::user();
        $validator = user_type::validator($request->all(), $request->get("user_type_id", ''));
        
        if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());
        }
      
        if($request->get("user_type_id") == '') {
            $usertypedetails = new user_type();
        } else {
            $usertypedetails = user_type::findOrFail($request->get("user_type_id"));
        }
        $usertypedetails->name = $request->get("name");
        $usertypedetails->status = $request->get("status");   

        //dd($usertypedetails);     
        $usertypedetails->save();
       return redirect(action('Admin\InternationalBranch\Usertype_controller@getIndex'))->with('success');
        
    }
    public function getEdit($user_type_id = '') 
    {
        $usertypedetails = user_type::findOrFail($user_type_id);  
        
        return view('admin.InternationalBranch.UserTypes.User_Type_form', compact('usertypedetails'))->with('success');
    }

     public function getDelete($user_type_id)
    {
         try
        {
      
        $user_type_id = user_type::findOrFail($user_type_id)->update(['is_delete'=>1])->save();
         return redirect(action('Admin\InternationalBranch\Usertype_controller@getIndex'))->with('success');
           
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }

    }

}
