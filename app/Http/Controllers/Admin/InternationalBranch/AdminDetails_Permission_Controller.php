<?php

namespace App\Http\Controllers\Admin\InternationalBranch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
//use App\role_permission_model;
use Datatables;
use App\menu_permission;
use App\Models\country;

use App\Models\user_personal_detail;
use DB;
use App\user_type;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use App\role_permission_model;
use App\Models\AdminGressDetails;
use App\Models\AdminGressPercentageDetails;

class AdminDetails_Permission_Controller extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
  
   
    public function getIndex() 
    {
        //$user=User::all();
        //DB::enableQueryLog();
		$AdminDetail=User::join('user_personal_details','user_personal_details.user_id','=','users.id')
                        ->join('country','country.country_id','=','user_personal_details.country_id')
                          ->select(DB::raw("CONCAT(user_personal_details.first_name,' ',user_personal_details.last_name) AS name"),'user_personal_details.company_logo','users.email','user_personal_details.country_id','user_personal_details.status','users.id','country.country_name')
                          ->where('users.user_type_id','=',1)
                          ->get();
           
         //dd(DB::getQueryLog());              
        $latestId=User::orderBy('id', 'desc')->first();  
        //dd($latestId);  

        
        
    	return view('admin.InternationalBranch.permission.permission_index',compact('AdminDetail','latestId'));
    }

	
	
    public function getPermission($userid='')
	{
		
		//dd($userid);
		
		if($userid!=""){
        $userid=User::where('id','=',$userid)->first();
		}
        $menulist=\App\admin_menu::all();
		//$role_permission = role_permission_model::where('')($role_permission);
		$role_perm=role_permission_model::join('users','users.id','=','role_permission.user_id')
					->where('users.id','=',$userid->id)
					->first();
       

			//dd($role_permission);
		return view('admin.InternationalBranch.permission.permission_add',compact('role_perm','menulist','userid'));
	}

   

       public function getPersonaldetails($userid = '')
    {
        //dd($userid);
        
        $getUserDetails=user_personal_detail::where('user_id','=',$userid)->first();
        

        $latestId=User::orderBy('id', 'desc')->first();  

        if($userid != ($latestId->id + 1))
            $userinfo=User::findorFail($userid);

        $country=Country::pluck('country_name','country_id')->toArray();
        $usertypes=user_type::pluck('name','user_type_id')->toArray();
        if(!empty($getUserDetails))
                return view('admin.InternationalBranch.Admin.Admin_Detials',compact('userinfo','country','usertypes','getUserDetails'));
        if(!empty($userinfo))
                 return view('admin.InternationalBranch.Admin.Admin_Detials',compact('userinfo','country','usertypes'));
        if(empty($userinfo))     
                 return view('admin.InternationalBranch.Admin.Admin_Detials',compact('country','usertypes','latestId'));
    }

	
	public function postSave(Request $request) 
    {

		
        $role_permission = Auth::user();
		
        $validator =role_permission_model::validator($request->all(), $request->get("role_permission_id", ''));
        
        if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());

        }
     
        if($request->get("role_permission_id") == '') {
            $role_permission = new role_permission_model();
                   
        } else {
            $role_permission = role_permission_model::findOrFail($request->get("role_permission_id"));
                       
        }

        $role_permission->user_id = $request->get("user_id");
        $role_permission->user_type_id = $request->get("user_type_id");
//$role_permission->user_type_id=1;
        $role_permission->add_permission=serialize($request->get("add_permission")); 
        $role_permission->edit_permission=serialize($request->get('edit_permission'));
        $role_permission->delete_permission=serialize($request->get('delete_permission'));
        $role_permission->view_permission=serialize($request->get('view_permission'));
        
		
		$role_permission->save();
       return redirect(action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getIndex'))->with('success');
        
    }

    // User Personal Details 
     public function postSavePersonalUserDetails(Request $request) 
    {

        $users = Auth::user();
        $usersdetails=Auth::user();
        

        $validator =user_personal_detail::validator($request->all(), $request->get("user_personal_details_id", ''));
        
        if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());

        }

     
        if($request->get("user_personal_details_id") == '')  {
            $usersdetails = new user_personal_detail();
           
        } else {
            $usersdetails = user_personal_detail::findOrFail($request->get("user_personal_details_id"));
           
              
        }
//dd($request->get("user_id"));
         if($request->get("user_id") == ''){
                $users=new user();
              // dd("1111111111111111111");
          }else {
                $users = user::findOrFail($request->get("user_id"));
                // dd("2222222222");
          }

          //dd('3333333');
          if($file = $request->hasFile('logo')) {

            $file = $request->file('logo') ;
            if($file)
            {
                    $extension =  $file->clientExtension();
            }
            $fileName = $file->getClientOriginalName() ;
            
            $destinationPath = public_path().'/company_logo/';
            $file->move($destinationPath,'Company_logo_'.$fileName);
            $usersdetails->company_logo = 'Company_logo_'.$fileName ;

        }

         $users->user_Type_id = $request->get("usertypes");
         $users->name = $request->get("username");
         $users->email = $request->get("email");
         $users->textpassword = $request->get("Password");
         $users->password = bcrypt($request->get("Password"));
        //dd($users);
         $users->save();

        if($request->get("user_id") == ''){
           // dd($request->get("new_user_id"));
             $latestId=User::orderBy('id', 'desc')->first();  
            $usersdetails->user_id = $latestId->id;

         }else{
           // dd("2222222222");
            $usersdetails->user_id = $request->get("user_id");
         }   
        

        $usersdetails->first_name = $request->get("firstname");
        $usersdetails->last_name = $request->get("lastname");
        $usersdetails->telephone = $request->get("telephone");
        $usersdetails->postal_code = $request->get("postal_code");
        $usersdetails->city = $request->get("city");
        $usersdetails->state = $request->get("state");
        $usersdetails->country_id = $request->get("country_id");
        $usersdetails->status = $request->get("status");

        //dd($usersdetails);
         
       

       //dd($users->save()->toSql());
        $usersdetails->save();
       
       return redirect(action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getIndex'))->with('success');
        
    }
     public function anyActive($user_id) {
         $usersdetails = user_personal_detail::findOrFail($user_id);
         $usersdetails->status = 1;
         $usersdetails->save();
       return redirect(action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getIndex'))->with('success');

    }
     public function anyInactive($user_id) {
         $usersdetails = user_personal_detail::findOrFail($user_id);
         $usersdetails->status = 0;
         $usersdetails->save();
       return redirect(action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getIndex'))->with('success');
    }
       public function getDelete($user_id)
    {
        try
        {
            $usersdetails = user_personal_detail::findOrFail($user_id)->update(['is_delete'=>1]);
            return redirect(action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getIndex'))->with('success');
        } catch (\Exception $ex) {
            
        }

    }

    //Admin Gress AND Term And Condition Details

    public function getAdminGressDetails($userid=''){

        $currency=\App\Models\Currency::where('status','=','1')->where('is_delete','=','0')->pluck('currency_code','currency_id')->toArray();
        $quantity=\App\Models\Product_Quantity::where('status','=','1')->get();

        $gressdata=AdminGressDetails::where('user_id','=',$userid)->first();
        if(!empty($gressdata))
        $gresspercentagedata=AdminGressPercentageDetails::where('admin_gress_details_id','=',$gressdata->admin_gress_details_id)->get();              
            
		if(empty($gressdata)){
             return view('admin.InternationalBranch.Admin.Admin_Gress_Details',compact('userid','currency','quantity'));
        }else{
             return view('admin.InternationalBranch.Admin.Admin_Gress_Details',compact('userid','currency','quantity','gressdata','gresspercentagedata'));
        }
       

    }
    public function postSaveGressData(Request $request){

       
        $UsersGressDetails=Auth::user();
        
        $validator =AdminGressDetails::validator($request->all(), $request->get("admin_gress_details_id", ''));

         if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());

        }

         if($request->get("admin_gress_details_id") == ''){
                $UsersGressDetails=new AdminGressDetails();
               //dd("1111111111111111111");
          }else {
                $UsersGressDetails = AdminGressDetails::findOrFail($request->get("admin_gress_details_id"));
                 //dd("2222222222");
          }
          $UsersGressDetails->user_id=$request->get('admin_user_id');
          $UsersGressDetails->gst_for_invoice=$request->get('gst_for_invoice');
          $UsersGressDetails->company_address=$request->get('company_address');
          $UsersGressDetails->bank_address=$request->get('bank_address');
          $UsersGressDetails->email_signature=$request->get('email_signature');
          $UsersGressDetails->term_and_conditions=$request->get('Termsandconditions');
          $UsersGressDetails->valve_price=$request->get('valve_price');
          $UsersGressDetails->color_plate_price=$request->get('color_plate_price');
          $UsersGressDetails->gress_for_cylinder=$request->get('gress_for_cylinder');
          $UsersGressDetails->stockorder_quantity_for_price=$request->get('Stock_Order_Quantity_For_Price');
          $UsersGressDetails->stockorder_price_display=$request->get('stock_order_price');
          $UsersGressDetails->multiquotation_price_display=$request->get('multi_quotation_price');
          $UsersGressDetails->allow_currency_selection=$request->get('allow_currency_selection');
          $UsersGressDetails->send_email_with_gress=$request->get('send_email_with_gress_price');
          $UsersGressDetails->order_limit=$request->get('order_limit');
          $UsersGressDetails->primary_currency=$request->get('primary_currency');
          $UsersGressDetails->secondary_currency=$request->get('secondary_currency');
          $UsersGressDetails->product_currency_rate=$request->get('product_currency_rate');
          $UsersGressDetails->cylinder_currency_rate=$request->get('cylinder_currency_rate');
          $UsersGressDetails->tool_currency_rate=$request->get('tool_currency_rate');
          $UsersGressDetails->status=$request->get('status');

          //dd($UsersGressDetails);
          $UsersGressDetails->save();
        $validator =AdminGressPercentageDetails::validator($request->all(), $request->get("admin_gress_percentage_id", ''));

         if($validator->fails()) {            
            return redirect()->back()
                ->withErrors($validator->getMessageBag())
                ->withInput($request->all());


        }
         if($request->get("admin_gress_percentage_id") == ''){
                $UsersGressPercentageDetails=new AdminGressPercentageDetails();
              // dd("1111111111111111111");
          }else {
                $UsersGressPercentageDetails = AdminGressPercentageDetails::findOrFail($request->get("admin_gress_percentage_id"));
                // dd("2222222222");
          }
      
          $latestId=AdminGressDetails::orderBy('admin_gress_details_id', 'desc')->first();
         
          $quantity=\App\Models\Product_Quantity::where('status','=','1')->pluck('quantity')->toArray();                                                                                                                                                                                                                                                                                                                                                                                                                                              
       
          $UsersGressPercentageDetails->admin_gress_percentage_id=$request->get('admin_gress_percentage_id');
          $UsersGressPercentageDetails->user_id=$request->get('admin_user_id');
          $UsersGressPercentageDetails->by_factory=$request->get('quantity_Factory_price');
          $UsersGressPercentageDetails->by_air=$request->get('quantity_Air_price');
          $UsersGressPercentageDetails->by_sea=$request->get('quantity_Sea_price');

          $count=count($request->get('quantity_Factory_price'));

           for($i = 0; $i <$count; $i++){

             if($request->get('admin_gress_percentage_id')!=''){
               $gress_details = array(
                'admin_gress_percentage_id' => $UsersGressPercentageDetails->admin_gress_percentage_id[$i],
                'user_id' => $UsersGressPercentageDetails->user_id,
                'admin_gress_details_id' => $latestId->admin_gress_details_id,
                'quantity' => $quantity[$i],
                'by_factory' => $UsersGressPercentageDetails->by_factory [$i],
                'by_air' => $UsersGressPercentageDetails->by_air [$i],
                'by_sea' => $UsersGressPercentageDetails->by_sea [$i],
                
            );
             }else{
            $gress_details = array(
                'user_id' => $UsersGressPercentageDetails->user_id,
                'admin_gress_details_id' => $latestId->admin_gress_details_id,
                'quantity' => $quantity[$i],
                'by_factory' => $UsersGressPercentageDetails->by_factory [$i],
                'by_air' => $UsersGressPercentageDetails->by_air [$i],
                'by_sea' => $UsersGressPercentageDetails->by_sea [$i],
                
            );
            }
         
         if($request->get('admin_gress_percentage_id')=='')
            {    
                
              AdminGressPercentageDetails::create($gress_details);
            }
          else 
            {
              
              $up = AdminGressPercentageDetails::where('admin_gress_percentage_id',$UsersGressPercentageDetails->admin_gress_percentage_id [$i])->update($gress_details);
            }
        }      

        return redirect('/menu_permission');
    }
}
