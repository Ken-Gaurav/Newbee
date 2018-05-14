<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Courier_Model;
use Datatables;

class Courier_Controller extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function getIndex()
	{	
		$courier = Courier_Model::all("*");
		return view('admin.setting.Courier.courier_index',compact("courier"));
	}

	public function getCreate()
	{
		return view('admin.setting.Courier.courier_form');
	}

	public function postSave(Request $request)
	{
		$courier = Auth::user();
		$validator = Courier_Model::validator($request->all(), $request->get("courier_id",''));
		
		if($validator->fails()){
			return redirect()->back()
			->withErrors($validator->getMeassageBag())
			->withInput($request->all());
		}

		if($request->get("courier_id") == '')
		{
			$courier = new Courier_Model();
		}
		else
		{
			$courier = Courier_Model::findorFail($request->get("courier_id"));
		}

		$courier->courier_name = $request->get("courier_name");
		$courier->contact_person = $request->get("contact_person");
		$courier->email = $request->get("email");
		$courier->telephone = $request->get("telephone");
		$courier->fuel_surcharge = $request->get("fuel_surcharge");
		$courier->service_tax = $request->get("service_tax");
		$courier->handling_charge = $request->get("handling_charge");
		$courier->status = $request->get("status");
		$courier->save();

		return redirect(action('Admin\Setting\Courier_Controller@getIndex'))->with('success');

	}

	public function getData()
	{	
		$courier = Courier_Model::where('is_delete','0')->get();

		return Datatables::of($courier)	
		->addColumn('courier_id', function ($courier){
			return '<input type="checkbox" class="sub_chk" data-id="'.$courier->courier_id.'" value="'.$courier->courier_id.'">';
		})

		->addColumn('status', function ($courier){
			if ($courier->status == 1) {
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox"  class="onoffswitch-checkbox" data-id="' . $courier->courier_id . '" id="' . $courier->courier_id . '" checked >
                                    <label id="ac" class="onoffswitch-label" for="' . $courier->courier_id . '" data-id="' . $courier->courier_id . '" status-id="' . $courier->status . '">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>';
                } else {
                    return '<div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox"  class="onoffswitch-checkbox" data-id="' . $courier->courier_id . '" id="' . $courier->courier_id . '" >
                                    <label id="ac" class="onoffswitch-label" for="' . $courier->courier_id . '" data-id="' . $courier->courier_id . '" status-id="' . $courier->status . '">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>';
                }
		})

		->addColumn('contact_person', function ($courier){
			return '<td><b>Contact Person:</b>&nbsp;'.strtoupper($courier->contact_person).'</td><br><b>Contact Email:&nbsp;</b><td>'.$courier->email.'</td><br><b>Contact Telephone:&nbsp;</b><td>'.$courier->telephone.'</td>';

		})
		
		->addColumn('action', function ($courier){
			return '<a href="'.action('Admin\Setting\Courier_Controller@getEdit',[$courier->courier_id]).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o"></i>Edit</a>';
		})
		->make('true');
	}

	public function getEdit($courier = '')
	{
		$courier = Courier_Model::findorFail($courier);
		return view('admin.setting.Courier.courier_form',compact("courier"));		
	}

	public function anyStatus(Request $request)
	{
		$courier = Courier_Model::findorFail($request->get("courier_id"));
		$courier->courier_id = $request->get("courier_id");
		$courier->status = $request->get("status");
		$courier->save();

		return response()->json(['success'=>"Status Change Successfully."]);		
	}

	public function getDelete(Request $request)
	{
		try
		{
			$courier = Courier_Model::findorFail($courier)->update(['is_delete'=>1])->save();

			return redirect(action('Admin\Setting\Courier_Controller@getIndex'))->with('success');
		}
		catch(\Exception $ex){
			return response()->json(['error' => $ex->getMeassage()]);
		}
	}

	public function getRemove(Request $request)
	{
		try
        {
            $ids = $request->ids;       
           
            Courier_Model::whereIn('courier_id',explode(",",$ids))->update(['is_delete'=>1]);
           
            return response()->json(['success'=>"Products Deleted successfully."]);
            //return redirect(action('Admin\Product\CountryController@getIndex'))->with('success');
           
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()]);
        }

	}

	public function anyActiveall(Request $request)
	{
		$ids = $request->ids;
		$status = $request->get("status");

		Courier_Model::whereIn('courier_id',explode(",", $ids))->update(['status' => $status]);

		return response()->json(['success'=>"Status Change Successfully."]);

	}

	public function anyInactiveall(Request $request)
	{
		$ids = $request->ids;
		$status = $request->get("status");

		Courier_Model::whereIn('courier_id',explode(",", $ids))->update(['status' => $status]);

		return response()->json(['success'=>"Status Change Successfully."]);
	}
	
}
