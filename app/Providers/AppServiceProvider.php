<?php

namespace App\Providers;
use View;
use Auth;
use App;
use DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
         view()->composer('*',function($view) {
            //$view->with('user', Auth::user());
            $view->with('categories', \App\admin_menu::tree());
                       
        });
       
          view()->composer('*',function($view) {
            if(Auth::user()){
            $view->with('role_permission',\App\role_permission_model::join('users','users.id','=','role_permission.user_id')
                    ->where('users.id','=',Auth::user()->id)
                    ->first());
        }
          });


           view()->composer('*',function($view) {
            //$view->with('user', Auth::user());
            $view->with('getAdminid', \App\admin_menu::Where('route','=',Route::getFacadeRoot()->current()->uri())->first());

                       
        });

             view()->composer('*',function($view) {
            //$view->with('user', Auth::user());
                if(Auth::user())
               $getdata=\App\Models\AssociatedAccounts::select('associated_users')->where('user_id','=',Auth::user()->id)->first();
            if(!empty($getdata)){
              $users=$getdata->associated_users;
              $view->with('Multilogin', DB::select('Select * from users where id IN  ('.$users.')'));
              }
                    
        });

         
          
	   
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    
}
