<?php

namespace App\Http\Controllers\Admin\InternationalBranch;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Employees;
use Datatables;
use App\Models\country;
use App\Models\AssociatedAccounts;
use DB;
use App\user_type;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;


class Employees_Details_Controller extends Controller
{
   
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function CreateEmployee($id=''){

        $Adminid=User::findorFail($id);
         $AllUsers=User::pluck('name','id')->toArray();
        $usertypes=user_type::where('user_type_id','<>','1')->pluck('name','user_type_id')->toArray();
         $country=Country::pluck('country_name','country_id')->toArray();
        return view('admin.InternationalBranch.Employee.Create_Employee',compact('Adminid','usertypes','country','AllUsers'));
    }

    public function getIndex(Request $request,$id='') 
    {

    	$Adminid=User::findorFail($id);
        $AllUsers=User::pluck('name','id')->toArray();  
    	//dd($Adminid);
    	return view('admin.InternationalBranch.Employee.Employee_list_index',compact('Adminid','AllUsers'));
    }

      public function getData($admin_id) {
        return Datatables::of(Employees::where('parent_user_id','=',$admin_id)->get())
        ->addColumn('employee_details_id', function ($emp_data) {
                return ' <input type="checkbox" class="sub_chk" data-id="'.$emp_data->employee_details_id.'"  value="' . $emp_data->employee_details_id . '">';
                
            })

         ->addColumn('status', function ($emp_data) {
                if($emp_data->status==1){
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$emp_data->employee_details_id.'" id="'.$emp_data->employee_details_id.'" checked>
                                    <label id="ac" class="onoffswitch-label" for="'.$emp_data->employee_details_id.'" status-id="'.$emp_data->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
                else{
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" class="onoffswitch-checkbox" data-id="'.$emp_data->employee_details_id.'" id="'.$emp_data->employee_details_id.'">
                                    <label id="ac" class="onoffswitch-label" for="'.$emp_data->employee_details_id.'" status-id="'.$emp_data->status.'">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch">
                                </div>
                            </div>';
                }
        })
        
        ->addColumn('action', function ($emp_data) {
                return '<a href="Editemployee/'.$emp_data->user_id.'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>&nbsp;' .
                    '<a  href="'. action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getPermission', [$emp_data->user_id]) .'" data-id="'. $emp_data->user_id . '" class="btn btn-xs btn-warning "><i class="fa fa-magic"></i> Permission</a>&nbsp;&nbsp;';
                
            })    
            ->make(true);
            
          
    }


      // User Personal Details 
     public function SaveEmployee(Request $request) 
    {
       
         $users = Auth::user();
        $Employees=Auth::user();
  
        
        $validator =Employees::validator($request->all(), $request->get("employee_details_id", ''));
        
        if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());

        }
      
        if($request->get("employee_details_id") == '')  {
            $Employees = new Employees();
             $users=new user();
            }else{
             $users = user::findOrFail($request->get("user_id"));
            $Employees = Employees::findOrFail($request->get("employee_details_id"));
        }
     
         $users->name = $request->get("username");
         $users->user_Type_id = $request->get("usertypes");
         $users->email = $request->get("email");
         $users->textpassword = $request->get("Password");
         $users->password = bcrypt($request->get("Password"));

       $users->save();

        if($request->get("employee_details_id") == ''){
            $latestId=User::orderBy('id', 'desc')->first();  
            $Employees->user_id = $latestId->id;

         }else{
              $Employees->user_id = $request->get("user_id");
         }   
          $adminid=$request->get("parent_user_id");        
        $Employees->parent_user_id = $request->get("parent_user_id");
        
        $Employees->first_name = $request->get("firstname");
        $Employees->last_name = $request->get("lastname");
        $Employees->telephone = $request->get("telephone");
        $Employees->postal_code = $request->get("postal_code");
        $Employees->city = $request->get("city");
        $Employees->state = $request->get("state");
        $Employees->country_id = $request->get("country_id");
        $Employees->email_signature = $request->get("email_signature");
        $Employees->stock_order_price = $request->get("stock_order_price");
        $Employees->multi_quotation_price = $request->get("multi_quotation_price");
        $Employees->status = $request->get("status");
    
        $Employees->save();

         if($request->get("associated_accounts_id") == '')  {
            $AssociatedAccounts = new AssociatedAccounts();
            }else{
           $AssociatedAccounts = AssociatedAccounts::findOrFail($request->get("associated_accounts_id"));
        }
        if($request->get("employee_details_id") == '')  {
           dd($request->get("employee_details_id"));  
         $latestUserId=User::orderBy('id', 'desc')->first();  
         $latestEmployeeId=Employees::orderBy('employee_details_id', 'desc')->first();  
         $AssociatedAccounts->user_id=$latestUserId->id; 
         $AssociatedAccounts->employee_detail_id=$latestEmployeeId->employee_details_id; 
      }
         $AssociatedAccounts->associated_users=$request->get('associated_acc');
         
         $AssociatedAccounts->save();

        //return redirect('/GetEmployee/'.$adminid);
       return redirect()->route('post.employee',$adminid);
       
        
    } 
    public function Edit($emp_user_id = '')
    { 
        $AllUsers=User::pluck('name','id')->toArray();
        $AssociatedAcc=AssociatedAccounts::where('user_id','=',$emp_user_id)->first();
        $userinfo=Employees::where('user_id','=',$emp_user_id)->first();
        $getEmployeedata=Employees::join('users','users.id','=','employee_details.user_id')
                    ->where('users.id','=',$userinfo->user_id)
                    ->where('employee_details.user_id','=',$userinfo->user_id)
                    ->first();
        
         $usertypes=user_type::where('user_type_id','<>','1')->pluck('name','user_type_id')->toArray();
         $country=Country::pluck('country_name','country_id')->toArray();
         //dd($getEmployeedata);
        return view('admin.InternationalBranch.Employee.Create_Employee',compact('getEmployeedata','usertypes','country','AllUsers','AssociatedAcc'));
        
    }

     public function getRemove(Request $request)
    {
        try{
            $ids = $request->ids;
            $del =Employees::whereIn('employee_details_id',explode(",", $ids));
            $del->delete();

            return response()->json(['success'=>'Employees Deitails Successfully Deleted.']);
        }
        catch(\Exception $ex){
            return response()->json(['error'=> $ex->getMessage()]);

        }
    }

    public function getActive(Request $request)
    {
        $ids = $request->ids;
        DB::table("employee_details")->whereIn('employee_details_id',explode(",",$ids))->update(['status' => 1]);
       
        return response()->json(['success'=>"Status change  successfully."]);      
    }

    public function getInactive(Request $request)
    {
        $ids = $request->ids;
      DB::table("employee_details")->whereIn('employee_details_id',explode(",",$ids))->update(['status' => 0]);
       
        return response()->json(['success'=>"Status change  successfully."]);  
    }
    public function Slider(Request $request) {
         $Employees = Employees::findOrFail($request->get("employee_details_id"));
         $Employees->employee_details_id = $request->get("employee_details_id");
         $Employees->status = $request->get("status");
         $Employees->save();
         return response()->json(['success'=>"Status change  successfully."]);        

    }

    
    
}
