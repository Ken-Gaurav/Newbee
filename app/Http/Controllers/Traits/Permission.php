<?php

namespace App\Http\Controllers\Traits;
use Illuminate\Support\Facades\Route;

use App\admin_menu;
use App\role_permission_model;
use Auth;

trait Permission {

    public function routename($route_name) {
       
        return admin_menu::select('*')->Where('route','=',$route_name)->first();
       // return admin_menu::select('*')->Where('route','=',Route::getFacadeRoot()->current()->uri())->first();
       
    }
    public function role_permission(){
    	return role_permission_model::join('users','users.id','=','role_permission.user_id')
                    ->where('users.id','=',Auth::user()->id)
                    ->first();
    }
}  