<?php


	


//Route::get('/','Auth\AuthController@LoginForm');

//Route::get('menuadd',array('as'=>'menuadd','uses'=>'admin_menu_controller@view'));

Route::get('myform/ajax/{id}',array('as'=>'menuadd.ajax','uses'=>'admin_menu_controller@myformAjax'));

Route::get('myform1/ajax/{id}',array('as'=>'menuadd.ajax','uses'=>'admin_menu_controller@myformAjax1'));
//Route::get('Menu','admin_menu_controller@getIndex');
//Route::get('menuadd','admin_menu_controller@view');
//Route::post('create','admin_menu_controller@insert');
Route::get('show','admin_menu_controller@view_show');
//Route::get('/','AuthController@LoginForm');


Route::get('accessdeny','admin_menu_controller@AccessDenied');


Route::group( ['prefix'=>'', 'as' => ''],function () {
 		
		Route::controller('Menu','admin_menu_controller');

 });

// Route::get('menuadd',array('as'=>'menuadd','uses'=>'admin_menu_controller@view'));

// Route::get('myform/ajax/{id}',array('as'=>'menuadd.ajax','uses'=>'admin_menu_controller@myformAjax'));

// Route::get('myform1/ajax/{id}',array('as'=>'menuadd.ajax','uses'=>'admin_menu_controller@myformAjax1'));

// Route::get('menu','admin_menu_controller@getIndex');
// Route::get('menuadd','admin_menu_controller@getView');
// Route::post('create','admin_menu_controller@insert');
// Route::get('show','admin_menu_controller@getShow');
// Route::get('edit','admin_menu_controller@getAnydata');

Route::auth();

// On url change to login and user is authorised automatic redirect to dashboard
 Route::group(['middleware' => 'usersession'], function () {
        Route::get('/', function ()    {
            // Uses User Session Middleware
        });
        Route::get('/', function () {
    return view('auth/login');
});
    });
 //------------------


Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'HomeController@dash');

//MultiLogin Route
Route::group(['namespace' => 'Multilogin','middleware' => ['auth']], function () {
Route::get('/Multilogin','MultiLoginController@Multilogin');
 });

 Route::group(['namespace' => 'Admin\Production','middleware' => ['auth']], function () {
		Route::controller('Unit','Unit_Master_Controller');
        Route::controller('Production_process','Production_Process_Controller');
        Route::controller('Product_category','Product_Category_Controller');
        Route::controller('Machine_Master','Machine_Master_Controller');
        Route::controller('Product_item_info','product_item_info_controller');
        Route::controller('Product_Inward','Product_Inward_Controller');
        Route::controller('job','Job_Master_Controller');
        // Route::get('job',array('as'=>'job','uses'=>'Job_Master_Controller@getCreate'));
         Route::get('/form/ajax/{id}',array('as'=>'add.ajax','uses'=>'Job_Master_Controller@getAjax'));

        
 });

 //Template
 Route::group(['namespace'=>'Admin\Template'], function () {
 		Route::controller('Template_Quantity','Template_QuantityController');
 		Route::controller('Template_Measurement','Template_MeasurementController');
 		Route::controller('Template_Volume','Template_VolumeController');
 });

//CRM COntroller

  Route::group(['namespace'=>'Admin\CRM'], function () {
 		Route::controller('lead_industry','Enquiry_Industry_Controller');
 		Route::controller('lead_source','Enquiry_Source_Controller');
 		Route::controller('contacts','Contacts_Controller');
 		
 });
 
 /* Route::group(['namespace'=>''], function () {
			Route::controller('menu_permission','Menu_permission_Controller');
 });*/
 Route::group(['namespace' => 'Admin\InternationalBranch','middleware' => ['auth']], function () {
 		Route::controller('menu_permission','AdminDetails_Permission_Controller');
 		Route::controller('user_types','Usertype_controller');
 		//Route::controller('GetEmployee','Employees_Details_Controller');
 		Route::get('/getEmployeeData/{admin_id}','Employees_Details_Controller@getData');
 		Route::get('/CreateEmployee/{admin_id}','Employees_Details_Controller@CreateEmployee');
 		Route::get('/GetEmployee/{id}','Employees_Details_Controller@getIndex')->name('post.employee');
 		Route::Post('/saveEmployee','Employees_Details_Controller@SaveEmployee');
 		Route::get('GetEmployee/Editemployee/{emp_id}','Employees_Details_Controller@Edit');
 		Route::get('/Employeeremove/{emp_id}','Employees_Details_Controller@getRemove');
 		Route::get('/EmployeeActive/{emp_id}','Employees_Details_Controller@getActive');
 		Route::get('/EmployeeInActive/{emp_id}','Employees_Details_Controller@getInactive');
 		Route::get('/EmployeeSlider','Employees_Details_Controller@Slider');
 		Route::get('/AssociatedAccounts','Employees_Details_Controller@AssociatedAccounts');
 		//Route::get('getPermission/{emp_id}','Employees_Details_Controller@Edit');

 		
 	 });
 

 Route::group(['namespace'=>'Admin\Setting'], function () {
 		Route::controller('currency','Currency_Controller');
 		Route::controller('country','Country_Controller');
 		Route::controller('bank_detail','Bank_Detail_Controller');
 		Route::controller('taxation','Taxation_Controller');
 		Route::controller('courier','Courier_Controller');
 });

 Route::group(['namespace'=>'Admin\Users'], function () {
 		Route::controller('International','International_users_controller');
 		
 });

 
//product 

Route::group(['namespace' => 'Admin\Product'], function () {
	 	
 		Route::controller('product','product_controller');
 		Route::controller('product_volume','Product_volume_Controller'); 		
		Route::controller('colorcategory','ColorcategoryController');
		Route::controller('Ink_master','Ink_master_Controller');
		Route::controller('Ink_solvent','Ink_solventController');
		Route::controller('Printing_effect','Printing_effectController');
		Route::controller('Custom_ink_mul','Custom_ink_mulController');			
		Route::controller('pouchstyle','pouch_style_controller');
		Route::controller('productlayer','product_layer_controller');
		Route::controller('mailerbage','mailer_bag_controller');
		Route::controller('zipperprice','zipper_price_controller');	
		Route::controller('productpouch','product_pouch_controller');
		Route::controller('adhesive','AdhesiveController');
		Route::controller('adhesive_solvent','Adhesive_solvent_Controller');
		Route::controller('cpp_adhesive','CPP_adhesive_Controller');
		Route::controller('product_quantity','Product_QuantityController');
		Route::controller('roll_quantity','Roll_QuantityController');
		Route::controller('roll_profit_pricing','Roll_profit_price_Controller');
		Route::controller('roll_packing','Roll_packing_Controller');
		Route::controller('roll_transport','Roll_transport_Controller');
		Route::controller('roll_wastage','Roll_wastage_Controller');
		Route::controller('accessorie_price','Accessorie_PriceController');
		Route::controller('packing_pricing','Packing_PricingController');
		Route::controller('pouch_color','pouch_color_Controller');
		Route::controller('product_make','Product_MakeController');	
		Route::controller('cylinder','cylinder_vender_Controller');
		Route::controller('cylinder_currency','Cylinder_CurrencyController');
		Route::controller('cylinder_base','Cylinder_base_Controller');			
		Route::controller('tool_pricing','tool_pricing_controller');	
		Route::controller('storezo_details','StorezoDetailController');	
		Route::controller('transport_sea','Transport_SeaController');
		Route::controller('product_material','Product_MaterialController');	
		Route::controller('stock_wastage','Stock_WastageController');	
		Route::controller('spout','Spout_Controller');
		Route::controller('stock_profit_air','stock_price_by_Air_controller');
		Route::controller('size_master','Size_master_Controller');
		Route::controller('spout_pouch','SpoutPouch_SizeController');
		Route::controller('stock_profit_sea','Stock_Profit_By_SeaController');
		Route::controller('view_size','View_sizeController');
		Route::controller('stock_profit_pickup','stock_profit_pickup_controller');
		Route::controller('profit_pricing','Profit_pricing_Controller');
		Route::controller('product_code','Product_Code_Controller');


	 });
Route::get('/get', 'Admin\PouchCOntroller@index');
// Route::get('/productlayer','Product\ProductLayerController@p_layer');
// Route::get('/new_product','Product\ProductLayerController@newproduct');

//Route::get('/menu_permission','Menu_permission_Controller@getData');
//Route::controller('menu_permission','Menu_permission_Controller');