<?php

namespace App\Http\Controllers\Admin\Users;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Datatables;
class International_users_controller extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
 public function getIndex()
    {
        return view('admin.Users.International.index');
    }

    public function getCreate()
    {
        $currency= Currency::pluck('currency_code','currency_id')->toArray();
        return view('admin.setting.Bank_Detail.form',compact('currency'));
    }
}
