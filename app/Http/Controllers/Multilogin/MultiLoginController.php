<?php

namespace App\Http\Controllers\Multilogin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;
use App\Http\Controllers\Controller;
use App\User;

class MultiLoginController extends Controller
{
    public function Multilogin(Request $request){
   
    	Session::flush();
    	$user_id=$request->userid;
    	$user = User::find($user_id);
		Auth::login($user);
    	}
}
