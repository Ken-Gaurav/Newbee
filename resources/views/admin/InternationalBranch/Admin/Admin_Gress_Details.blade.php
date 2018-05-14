
@extends('layouts.admin.default')

@section('styles')
   
@endsection

@section('header')
     <div class="row">
        <div class="col-lg-12">
         <h3><i class="fa fa-edit"></i> Admin Details</h3>
           
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                     <a href="/menu_permission" ><span class="nav-label">User Listing</span></a>
                </li>
                
                
            </ol>
        </div>
    </div>
@endsection

@section('content')
  <div class="row">
       <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title" >
                    <h5>User Details</h5>
                </div>
                <div class="ibox-content">
                     <div class="card-box">
                        
                    
                    <form class="form-horizontal blog-form" role="form" method="POST" action="{{action('Admin\InternationalBranch\AdminDetails_Permission_Controller@postSaveGressData') }}" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                         {{ Form::hidden('admin_user_id', isset($userid) ? $userid : '') }}
                         {{ Form::hidden('user_id', isset($gressdata) ? $gressdata->user_id : '') }}
                         {{ Form::hidden('admin_gress_details_id', isset($gressdata) ? $gressdata->admin_gress_details_id : '') }}
                         {{ Form::hidden('edit', isset($gresspercentagedata) ? '0' : '1') }}
                      
                      <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #352e35;">
                            <h5>Address & Term&Condition</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="carousel slide" id="carousel1">
                     
                   



                    <div class="form-group{{ $errors->has('gst_for_invoice') ? ' has-error' : '' }}">
                        {{Form::label('GST %(For Invoice)', 'GST %(For Invoice)',['class' => 'col-md-2 control-label'])}}
                        <div class="col-md-6">
                            {{Form::text('gst_for_invoice',old('gst_for_invoice', isset($gressdata) ? $gressdata->gst_for_invoice : ''),['class' => 'form-control','placeholder'=>'GST %(For Invoice)'])}}
                            @if ($errors->has('gst_for_invoice'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gst_for_invoice') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('company_address') ? ' has-error' : '' }}">
                        {{Form::label('Company Address(For Invoice)','Company Address(For Invoice)',['class' => 'col-md-2 control-label'])}}
                        <div class="col-md-4">
                            {{Form::textarea('company_address',old('company_address', isset($gressdata) ? $gressdata->company_address : ''),['class' => 'form-control','placeholder'=>'Company Address(For Invoice)'])}}
                            @if ($errors->has('company_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_address') }}</strong>
                                </span>
                            @endif
                        </div>
                   
                        {{Form::label('Bank Address (For Invoice)', 'Bank Address (For Invoice)',['class' => 'col-md-2 control-label'])}}
                        <div class="col-md-4">
                            {{Form::textarea('bank_address',old('benefry_add', isset($gressdata) ? $gressdata->bank_address : ''),['class' => 'form-control','placeholder'=>'Bank Address (For Invoice)'])}}
                            @if ($errors->has('bank_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bank_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group{{ $errors->has('EmailSignature') ? ' has-error' : '' }}">
                        {{Form::label('Email_Signature', 'Email Signature',['class' => 'col-md-2 control-label'])}}  
                        <div class="col-md-8">
                        <div class="ibox-content no-padding">
                            <div id="summernote"></div>
                       </div>
                    </div>
                </div>

                 {{ Form::hidden('email_signature', isset($gressdata) ? $gressdata->email_signature : '',['id'=>'email_signature']) }}



                    <div class="form-group{{ $errors->has('EmailSignature') ? ' has-error' : '' }}">
                        {{Form::label('Terms and conditions For Sales Invoice', 'Terms and conditions For Sales Invoice',['class' => 'col-md-2 control-label'])}}  
                        <div class="col-md-8">
                        <div class="ibox-content no-padding">
                            <div id="summernote1"></div>
                       </div>
                    </div>
                </div>

                 {{ Form::hidden('Termsandconditions', isset($gressdata) ? $gressdata->term_and_conditions : '',['id'=>'Termsandconditions']) }}
                      


                            </div>
                        </div>
                    </div>
                        
                </div>
                 <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #352e35;">
                            <h5>For Quotation</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="carousel slide" id="carousel1">
                              
                              <div class="form-group{{ $errors->has('color_plate_price') ? ' has-error' : '' }}">
                                  {{Form::label('Color Plate Price For Digital Print', 'Color Plate Price For Digital Print',['class' => 'col-md-2 control-label'])}}
                                  <div class="col-md-6">
                                      {{Form::text('color_plate_price',old('color_plate_price', isset($gressdata) ? $gressdata->color_plate_price : ''),['class' => 'form-control','placeholder'=>'Color Plate Price For Digital Print'])}}
                                      @if ($errors->has('color_plate_price'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('color_plate_price') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>     

                              <div class="form-group{{ $errors->has('valve_price') ? ' has-error' : '' }}">
                                  {{Form::label('Valve Price(Indian Rupee)', 'Valve Price(Indian Rupee)',['class' => 'col-md-2 control-label'])}}
                                  <div class="col-md-6">
                                      {{Form::text('valve_price',old('valve_price', isset($gressdata) ? $gressdata->valve_price : ''),['class' => 'form-control','placeholder'=>'Valve Price(Indian Rupee )'])}}
                                      @if ($errors->has('valve_price'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('valve_price') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>          

                             <div class="form-group{{ $errors->has('gress_for_cylinder') ? ' has-error' : '' }}">
                                  {{Form::label('Gres(Percentage % For Cylinder)', 'Gres(Percentage % For Cylinder)',['class' => 'col-md-2 control-label'])}}
                                  <div class="col-md-6">
                                      {{Form::text('gress_for_cylinder',old('gress_for_cylinder', isset($gressdata) ? $gressdata->gress_for_cylinder : ''),['class' => 'form-control','placeholder'=>'Gres(Percentage % For Cylinder)'])}}
                                      @if ($errors->has('gress_for_cylinder'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('gress_for_cylinder') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                           
                              <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" >
                                        <h5>Gres Percentage (% For Factory Qty Wise)</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content" style="display: block;">

                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Quantity</th>
                                                <th>Gress Percentage % For Factory</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                             @if(isset($gresspercentagedata))  
                                              @foreach($gresspercentagedata as $quantityFactory)
                                            <tr>
                                                {{Form::hidden('admin_gress_percentage_id[]',old('admin_gress_percentage_id',$quantityFactory->admin_gress_percentage_id),['class' => 'form-control'])}}
                                                <td>{{Form::text('quantity_id',old('quantity_id',$quantityFactory->quantity),['class' => 'form-control'])}}</td>
                                                <td>{{Form::text('quantity_Factory_price[]',old('quantity_Factory_price', isset($quantityFactory) ? $quantityFactory->by_factory : ''),['class' => 'form-control','placeholder'=>'By Factory Gres %'])}}</td>
                                            </tr>
                                            @endforeach
                                             @else
                                              @foreach($quantity as $quantityFactory)
                                            <tr>
                                                <td>{{Form::text('quantity_id',old('accnt_no',$quantityFactory->quantity),['class' => 'form-control','placeholder'=>'Gres(Percentage % For Cylinder)'])}}</td>
                                                <td>{{Form::text('quantity_Factory_price[]',old('accnt_no', isset($bank) ? $bank->accnt_no : ''),['class' => 'form-control','placeholder'=>'By Factory Gres %'])}}</td>
                                            </tr>
                                            @endforeach
                                             @endif   
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" >
                                        <h5>Gres Percentage (% For Air Qty Wise)</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                           <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="ibox-content" style="display: block;">

                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Quantity</th>
                                                <th>Gress Percentage % For Air</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                              @if(isset($gresspercentagedata))  
                                              @foreach($gresspercentagedata as $quantityAir)
                                            <tr>
                                                
                                                <td>{{Form::text('quantity_id',old('quantity_id',$quantityAir->quantity),['class' => 'form-control','placeholder'=>'Gres(Percentage % For Cylinder)'])}}</td>
                                                <td>{{Form::text('quantity_Air_price[]',old('quantity_Air_price', isset($quantityAir) ? $quantityAir->by_air : ''),['class' => 'form-control','placeholder'=>'By Factory Gres %'])}}</td>
                                            </tr>
                                            @endforeach
                                             @else
                                             @foreach($quantity as $quantityAir)
                                            <tr>
                                                <td>{{Form::text('quantity_id',old('accnt_no',$quantityAir->quantity),['class' => 'form-control','placeholder'=>'Gres(Percentage % For Cylinder)'])}}</td>
                                                <td>{{Form::text('quantity_Air_price[]','',['class' => 'form-control','placeholder'=>'By Air Gres %'])}}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title" >
                                        <h5>Gres Percentage (% For Sea Qty Wise)</h5>
                                        <div class="ibox-tools">
                                            <a class="collapse-link">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                            <a class="close-link">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ibox-content" style="display: block;">

                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Quantity</th>
                                                <th>Gress Percentage % For Sea</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                               @if(isset($gresspercentagedata))  
                                              @foreach($gresspercentagedata as $quantitySea)
                                            <tr>
                                                
                                                <td>{{Form::text('quantity_id',old('quantity_id',$quantitySea->quantity),['class' => 'form-control'])}}</td>
                                                <td>{{Form::text('quantity_Sea_price[]',old('quantity_Factory_price', isset($quantitySea) ? $quantitySea->by_sea : ''),['class' => 'form-control','placeholder'=>'By Factory Gres %'])}}</td>
                                            </tr>
                                            @endforeach
                                             @else
                                             @foreach($quantity as $quantitySea)
                                            <tr>
                                                <td>{{Form::text('quantity_id',old('accnt_no',$quantitySea->quantity),['class' => 'form-control'])}}</td>
                                                <td>{{Form::text('quantity_Sea_price[]','',['class' => 'form-control','placeholder'=>'By Sea Gres %'])}}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                               
                            </div>
                        </div>
                    </div>
                        
                </div>
                 <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" style="background: #352e35;">
                            <h5>Other Details</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="carousel slide" id="carousel1">

                              <div class="form-group">

                                        {{Form::label('Stock_Order_Quantity_Price','Stock Order Quantity For Price',['class' => 'col-md-2 control-label'])}}
                                            <div class="col-lg-4">
                                            <div class="i-checks">
                                            {{ Form::radio('Stock_Order_Quantity_For_Price', '1000',isset($gressdata) ? $gressdata->stockorder_quantity_for_price== '1000' : '',['class'=>'iradio_square-green ']) }} {{ Form::label('','1000') }}&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;
                                            {{ Form::radio('Stock_Order_Quantity_For_Price','2000',isset($gressdata) ? $gressdata->stockorder_quantity_for_price== '2000' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', '2000') }}&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;
                                            {{ Form::radio('Stock_Order_Quantity_For_Price','5000',isset($gressdata) ? $gressdata->stockorder_quantity_for_price== '5000' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', '5000') }}&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;
                                            {{ Form::radio('Stock_Order_Quantity_For_Price','10000',isset($gressdata) ? $gressdata->stockorder_quantity_for_price== '10000' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', '10000') }}&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;
                                            {{ Form::radio('Stock_Order_Quantity_For_Price','Normal',isset($gressdata) ? $gressdata->stockorder_quantity_for_price== 'Normal' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', 'Normal') }}

                                        </div>
                                     </div>
                                  </div>
                                  <hr>

                                   <div class="form-group">
                                        {{Form::label('stock_order_price','Stock order Price Display',['class' => 'col-md-2 control-label'])}}
                                            <div class="col-lg-4">
                                            <div class="i-checks">
                                            {{ Form::radio('stock_order_price', '1',isset($gressdata) ? $gressdata->stockorder_price_display== '1' : '',['class'=>'iradio_square-green']) }}  {{ Form::label('','Yes') }}&emsp14;&emsp14;&emsp14;
                                            {{ Form::radio('stock_order_price','0',isset($gressdata) ? $gressdata->stockorder_price_display== '0' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', 'No') }}

                                        </div>
                                     </div>
                                  </div>
                                  <hr>

                                <div class="form-group">
                                        {{Form::label('multi_quotation_price','Multi Quitation Price Display',['class' => 'col-md-2 control-label'])}}
                                            <div class="col-lg-4">
                                            <div class="i-checks">
                                            {{ Form::radio('multi_quotation_price', '1',isset($gressdata) ? $gressdata->multiquotation_price_display== '1' : '',['class'=>'iradio_square-green']) }}  {{ Form::label('','Yes') }}&emsp14;&emsp14;&emsp14;
                                            {{ Form::radio('multi_quotation_price','0',isset($gressdata) ? $gressdata->multiquotation_price_display== '0' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', 'No') }}

                                        </div>
                                    </div>
                                </div><hr>

                                 <div class="form-group">
                                        {{Form::label('Allow Currency Selection','Allow Currency Selection',['class' => 'col-md-2 control-label'])}}
                                            <div class="col-lg-4">
                                            <div class="i-checks">
                                            {{ Form::radio('allow_currency_selection', '1',isset($gressdata) ? $gressdata->allow_currency_selection== '1' : '',['class'=>'iradio_square-green']) }}  {{ Form::label('','Yes') }}&emsp14;&emsp14;&emsp14;
                                            {{ Form::radio('allow_currency_selection','0',isset($gressdata) ? $gressdata->allow_currency_selection== '0' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', 'No') }}

                                        </div>
                                     </div>
                                  </div><hr>

                                  <div class="form-group">
                                        {{Form::label('Send Email With Gress Price','Send Email With Gress Price',['class' => 'col-md-2 control-label'])}}
                                            <div class="col-lg-4">
                                            <div class="i-checks">
                                            {{ Form::radio('send_email_with_gress_price', '1',isset($gressdata) ? $gressdata->send_email_with_gress== '1' : '',['class'=>'iradio_square-green']) }}  {{ Form::label('','Yes') }}&emsp14;&emsp14;&emsp14;
                                            {{ Form::radio('send_email_with_gress_price','0',isset($gressdata) ? $gressdata->send_email_with_gress== '0' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', 'No') }}

                                        </div>
                                     </div>
                                  </div> <hr> 


                                <div class="form-group{{ $errors->has('order_limit') ? ' has-error' : '' }}">
                                  {{Form::label('Order Limit', 'Order Limit',['class' => 'col-md-2 control-label'])}}
                                  <div class="col-md-6">
                                      {{Form::text('order_limit',old('accnt_no', isset($gressdata) ? $gressdata->order_limit : ''),['class' => 'form-control','placeholder'=>'Order Limit'])}}
                                      @if ($errors->has('order_limit'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('order_limit') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>     

                               <div class="form-group{{ $errors->has('primary_currency') ? ' has-error' : '' }}">
                                  {{Form::label('Primary Currency', 'Primary Currency',['class' => 'col-md-2 control-label'])}}
                                  <div class="col-md-2">

                                      {!!form::select('primary_currency',$currency,isset($gressdata) ? $gressdata->primary_currency : '',['class'=>'form-control m-b','id'=>'primary_currency','placeholder'=>'Select Primary Currency'])!!}

                                      @if ($errors->has('primary_currency'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('primary_currency') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              

                              <div class="form-group{{ $errors->has('secondary_currency') ? ' has-error' : '' }}">
                                  {{Form::label('Secondary Currency', 'Secondary Currency',['class' => 'col-md-2 control-label'])}}
                                  <div class="col-md-2">

                                      {!!form::select('secondary_currency',$currency,isset($gressdata) ? $gressdata->secondary_currency : '',['class'=>'form-control m-b','id'=>'primary_currency','placeholder'=>'Select Secondary Currency'])!!}

                                      @if ($errors->has('secondary_currency'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('secondary_currency') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('product_currency_rate') ? ' has-error' : '' }}">
                                  {{Form::label('Product-Currency Rate', 'Product-Currency Rate',['class' => 'col-md-2 control-label'])}}
                                  <div class="col-md-6">
                                      {{Form::text('product_currency_rate',old('product_currency_rate', isset($gressdata) ? $gressdata->product_currency_rate : ''),['class' => 'form-control','placeholder'=>'Product-Currency Rate'])}}
                                      @if ($errors->has('product_currency_rate'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('product_currency_rate') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>  

                              <div class="form-group{{ $errors->has('cylinder_currency_rate') ? ' has-error' : '' }}">
                                  {{Form::label('Cylinder-Currency Rate', 'Cylinder-Currency Rate',['class' => 'col-md-2 control-label'])}}
                                  <div class="col-md-6">
                                      {{Form::text('cylinder_currency_rate',old('cylinder_currency_rate', isset($gressdata) ? $gressdata->cylinder_currency_rate : ''),['class' => 'form-control','placeholder'=>'Cylinder-Currency Rate'])}}
                                      @if ($errors->has('cylinder_currency_rate'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('cylinder_currency_rate') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>     

                              <div class="form-group{{ $errors->has('tool_currency_rate') ? ' has-error' : '' }}">
                                  {{Form::label('Tool-Currency Rate', 'Tool-Currency Rate',['class' => 'col-md-2 control-label'])}}
                                  <div class="col-md-6">
                                      {{Form::text('tool_currency_rate',old('tool_currency_rate', isset($gressdata) ? $gressdata->tool_currency_rate : ''),['class' => 'form-control','placeholder'=>'Tool-Currency Rate'])}}
                                      @if ($errors->has('tool_currency_rate'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('tool_currency_rate') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>   


                          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                              {{Form::label('status', trans('dashboard.status'),['class' => 'col-md-2 control-label'])}}
                                  <div class="col-lg-2" >                                                  
                                      {!!form::select('status',['1'=>'Active','0'=>'Inactive'],isset($gressdata) ? $gressdata->status: "",['class'=>'form-control m-b'])!!}

                                      @if ($errors->has('status'))
                                          <span class="help-block">
                                                  <strong>{{ $errors->first('status') }}</strong>
                                              </span>
                                      @endif
                                  </div>
                          </div>        

                
                               
                            </div>
                        </div>
                    </div>
                        
                </div>

          

                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                @if(!empty($packing_pricing))
                                <button type="submit" class="btn btn-primary">Update</button>
                                {!! link_to(url()->previous(), 'Cancel', ['class' => 'btn btn-white']) !!}
                            @else
                                <button type="submit" class="btn btn-primary">Save</button>
                                {!! link_to(url()->previous(), 'Cancel', ['class' => 'btn btn-white']) !!}
                            @endif
                                </div>
                        </div>                                     
                       
                   </form>

                    </div>
                </div>
            </div>
        </div>
  </div>
  @endsection

@section('footer_scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

         $(document).ready(function(){
//alert($('#employee_details_id').val());
               
             if($('#employee_details_id').val()!=""){
                     var data=$('#email_signature').val();
                     $('#summernote').summernote({
      
                       height: 200,   //set editable area's height
                      codemirror: '', // codemirror options
                      theme: 'monokai'
                       });

             $('#summernote').summernote('code',data);
                 }
                 if($('#employee_details_id').val()==""){     
                     $('#summernote').summernote({
                    
                      height: 200,   //set editable area's height
                      codemirror:'', // codemirror options
                      theme: 'monokai'
                  });
                  }

           

          });

         $(document).ready(function(){
//alert($('#employee_details_id').val());
               
             if($('#Termsandconditions').val()!=""){
                     var data=$('#email_signature').val();
                     $('#summernote1').summernote({
      
                       height: 200,   //set editable area's height
                      codemirror: '', // codemirror options
                      theme: 'monokai'
                       });

             $('#summernote1').summernote('code',data);
                 }
                 if($('#Termsandconditions').val()==""){     
                     $('#summernote1').summernote({
                    
                      height: 200,   //set editable area's height
                      codemirror:'', // codemirror options
                      theme: 'monokai'
                  });
                  }

           

          });
          

             setInterval(function(){  $('#email_signature').val($('#summernote').summernote('code')); }, 1000);
             setInterval(function(){  $('#Termsandconditions').val($('#summernote1').summernote('code')); }, 1000);


// var opts =  $('select[name="usertypes"] > option').map(function() { return this.value; }).get();
// //$("#result").html("["+opts.join("][")+"]");
</script>
@endsection  