<?php

namespace App\Http\Controllers\Admin\CRM;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\user;
use App\Models\Contacts;
use Illuminate\Support\Facades\Auth;
use Datatables;
use DB;


class Contacts_Controller extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function getIndex() 
    {

    	  // $data=Contacts::where('status','1')->get();

         $data=Contacts::join('country','country.country_id','=','contacts.country')->where('contacts.status','1')->get();		
	    	return view('admin.Crm.Contacts.Contacts_Index',compact('data'));
    }

   public function anyContactDetails(Request $request){

    $ContactDetails=Contacts::where('contact_id','=',$request->contact_id)->first();
    
    return response()->json(['success' => true, 'ContactDetails' => $ContactDetails]);

   }
   public function getDelete($contact_id=""){

        $data = Contacts::find($contact_id)->delete();

        return redirect('contacts');

   }

   
}
