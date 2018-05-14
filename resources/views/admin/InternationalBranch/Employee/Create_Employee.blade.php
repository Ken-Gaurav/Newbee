
@extends('layouts.admin.default')

@section('styles')
   
@endsection

@section('header')

     <div class="row">
        <div class="col-lg-12">
         <h3><i class="fa fa-edit"></i> User Details</h3>
           
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                @if(isset($Adminid))
                <li>
                    <i class="fa fa-list"></i>
                     <a href="\GetEmployee\{{$Adminid->id}}" ><span class="nav-label">User Listing</span></a>
                </li>
                @endif
                
            </ol>
        </div>
    </div>

 


@endsection

@section('content')

  <div class="row">
       <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>User Details</h5>
                </div>
                <div class="ibox-content">
                     <div class="card-box">
                        
                     
                    <form class="form-horizontal blog-form" role="form" method="POST" action="/saveEmployee" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                           @if(isset($Adminid))
                         {{ Form::hidden('parent_user_id', isset($Adminid) ? $Adminid->id : '') }}
                         @elseif(isset($getEmployeedata))
                         {{ Form::hidden('parent_user_id', isset($getEmployeedata) ? $getEmployeedata->parent_user_id : '') }}
                         @endif
                         {{ Form::hidden('user_id', isset($getEmployeedata) ? $getEmployeedata->user_id : '') }}
                         {{ Form::hidden('employee_details_id', isset($getEmployeedata) ? $getEmployeedata->employee_details_id : '',['id'=>'employee_details_id']) }}
                         {{ Form::hidden('associated_accounts_id',isset($AssociatedAcc) ? $AssociatedAcc->associated_accounts_id : '',['id' => 'AssociatedAccounts']) }}
                       
                                                 
                     
 
                          <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                        {{Form::label('User Type','User Type',['class' => 'col-md-2 control-label'])}}
                        <div class="col-md-4">

                            {!!form::select('usertypes',$usertypes,isset($getEmployeedata) ? $getEmployeedata->user_type_id : '',['class'=>'form-control m-b','id'=>'usertypes'])!!}

                            @if ($errors->has('usertypes'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('usertypes') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                        <div class="form-group">
                            {{Form::label('username','User Name',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('username', isset($getEmployeedata) ? $getEmployeedata->name : '',['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('username'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                         </div>  
                   

                           
                           <div class="form-group">
                            {{Form::label('Password', 'Password',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('Password',old('Password', isset($getEmployeedata) ? $getEmployeedata->textpassword : ''),['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('Password'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('Password') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                          <div class="form-group">
                            {{Form::label('firstname', 'First Name',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('firstname',old('firstname', isset($getEmployeedata) ? $getEmployeedata->first_name : ''),['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('firstname'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('firstname') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                               
                        </div>

                        <div class="form-group">
                            {{Form::label('lastname', 'Last Name',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('lastname',old('lastname', isset($getEmployeedata) ? $getEmployeedata->last_name : ''),['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('lastname'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('lastname') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('email', 'Email',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::email('email',old('email', isset($getEmployeedata) ? $getEmployeedata->email : ''),['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('email'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('telephone', 'Telephone',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::number('telephone',old('telephone', isset($getEmployeedata) ? $getEmployeedata->telephone : ''),['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('telephone'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('telephone') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>


                        <div class="form-group">
                            {{Form::label('Postal Code', 'Postal Code',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('postal_code',old('postal_code', isset($getEmployeedata) ? $getEmployeedata->postal_code : ''),['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('postal_code'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>


                        <div class="form-group">
                            {{Form::label('City', 'City',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('city',old('city', isset($getEmployeedata) ? $getEmployeedata->city : ''),['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('city'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('State', 'State',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('state',old('state', isset($getEmployeedata) ? $getEmployeedata->state : ''),['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('state'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('State') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                     <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                        {{Form::label('country', trans('dashboard.country'),['class' => 'col-md-2 control-label'])}}
                        <div class="col-md-4">

                            {!!form::select('country_id',$country,isset($getEmployeedata) ? $getEmployeedata->country_id : '',['class'=>'form-control m-b','id'=>'country','placeholder'=>'Select Country'])!!}

                            @if ($errors->has('country_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country_id') }}</strong>
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

                 {{ Form::hidden('email_signature', isset($getEmployeedata) ? $getEmployeedata->email_signature : '',['id'=>'email_signature']) }}



                    <div class="form-group">
                            {{Form::label('stock_order_price','Stock order Price Display',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                <div class="i-checks">
                                {{ Form::radio('stock_order_price', '1',isset($getEmployeedata) ? $getEmployeedata->stock_order_price== '1' : '',['class'=>'iradio_square-green']) }}  {{ Form::label('','Yes') }}<br>
                                {{ Form::radio('stock_order_price','0',isset($getEmployeedata) ? $getEmployeedata->stock_order_price== '0' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', 'No') }}

                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                            {{Form::label('multi_quotation_price','Multi Quitation Price Display',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                <div class="i-checks">
                                {{ Form::radio('multi_quotation_price', '1',isset($getEmployeedata) ? $getEmployeedata->multi_quotation_price== '1' : '',['class'=>'iradio_square-green']) }}  {{ Form::label('','Yes') }}<br>
                                {{ Form::radio('multi_quotation_price','0',isset($getEmployeedata) ? $getEmployeedata->multi_quotation_price== '0' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', 'No') }}

                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                        {{Form::label('Associated Accounts','Associated Accounts',['class' => 'col-md-2 control-label'])}}   
                        <div class="col-md-4">


                        {!!form::select('user_ids',$AllUsers,'',['class'=>'chosen-select userss','id'=>'user_ids','multiple','style'=>'width:350px;','tabindex'=>'4'])!!}

                        @if ($errors->has('country_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('country_id') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>

                {{ Form::hidden('associated_acc',isset($AssociatedAcc) ? $AssociatedAcc->associated_users : '',['id' => 'associated_acc']) }}
                       


                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            {{Form::label('status', trans('dashboard.status'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2" >                                                  
                                    {!!form::select('status',['1'=>'Active','0'=>'Inactive'],isset($user_details) ? $user_details->status: "",['class'=>'form-control m-b'])!!}

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                    @endif
                                    

                          

                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                @if(!empty($getEmployeedata))
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
$('.chosen-select').chosen({width: "100%"});
$('select').on('change', function() {
   
            var users = [];
        $.each($(".userss option:selected"), function(){            
            users.push($(this).val());
        });
        users=users.join(",");
        //alert($(".userss").val());

      
    $('#associated_acc').val(users);
})

 $(document).ready(function(){
        var getmultiselectval=$('#associated_acc').val();
        var str_array = getmultiselectval.split(',');
        $(".userss").val(str_array).trigger("chosen:updated");

});

    $(document).ready(function(){

               
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
          

             setInterval(function(){  $('#email_signature').val($('#summernote').summernote('code')); }, 1000);


    </script>
 
@endsection