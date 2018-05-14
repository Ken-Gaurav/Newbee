@extends('layouts.admin.default')

@section('styles')
   
@endsection

@section('header')
     <div class="row">
        <div class="col-lg-12">
         <h3><i class="fa fa-edit"></i> Personal Details</h3>
           
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                
                
                
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
                        
                     
                    <form class="form-horizontal blog-form" role="form" method="POST" action="{{action('Admin\InternationalBranch\AdminDetails_Permission_Controller@postSavePersonalUserDetails') }}" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                        
                         @if(isset($userinfo))
                         {{ Form::hidden('user_id', isset($userinfo) ? $userinfo->id : '') }}
                         @endif
                          @if(isset($latestId))
                         {{ Form::hidden('user_id','') }}
                        
                         @endif
                         {{ Form::hidden('user_personal_details_id', isset($getUserDetails) ? $getUserDetails->user_personal_details_id : '',['id'=>'user_personal_details_id']) }}
                        
                       <div class="form-group" >

                            {{Form::label('select_image','Select Logo',['class' => 'col-md-2 control-label'])}}
                            <div class="col-lg-4">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control getlogo" data-trigger="fileinput">
                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                    <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                    <span class="fileinput-new" id='nofile'>Select file</span>
                                    <span class="fileinput-exists" id='nofile'>Change</span>
                                  
                                     {{ Form::file('logo',['text'=>isset($getUserDetails) ? $getUserDetails->company_logo : '']) }}
                                    </span>
                                  
                                </div> 
                                </div> 
                                        <div class="col-lg-2">
                                              @if(isset($getUserDetails))
                                                {{ Html::image('/company_logo/'.$getUserDetails->company_logo, 'a picture', array('class' => 'thumb','style'=>'height:100px;width:200px;')) }}
                                              @endif  
                                        </div>
                        </div> 

                        
                         {{ Form::hidden('company_logo',isset($getUserDetails) ? $getUserDetails->company_logo : '',['id'=>'company_logo']) }}

                    

                            {!!form::select('usertypes',$usertypes,isset($userinfo) ? $userinfo->user_type_id : '',['class'=>'form-control m-b','id'=>'usertypes','style'=>'display:none'])!!}


                        <div class="form-group">
                            {{Form::label('username','User Name',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('username', isset($userinfo) ? $userinfo->name : '',['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('userinfo'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('userinfo') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                         </div>  
                   

                           
                           <div class="form-group">
                            {{Form::label('Password', 'Password',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('Password',old('Password', isset($userinfo) ? $userinfo->textpassword : ''),['class' => 'form-control','placeholder'=>''])}}

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
                                    {{Form::text('firstname',old('firstname', isset($getUserDetails) ? $getUserDetails->first_name : ''),['class' => 'form-control','placeholder'=>''])}}

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
                                    {{Form::text('lastname',old('lastname', isset($getUserDetails) ? $getUserDetails->last_name : ''),['class' => 'form-control','placeholder'=>''])}}

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
                                    {{Form::email('email',old('email', isset($userinfo) ? $userinfo->email : ''),['class' => 'form-control','placeholder'=>''])}}

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
                                    {{Form::number('telephone',old('telephone', isset($getUserDetails) ? $getUserDetails->telephone : ''),['class' => 'form-control','placeholder'=>''])}}

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
                                    {{Form::text('postal_code',old('postal_code', isset($getUserDetails) ? $getUserDetails->postal_code : ''),['class' => 'form-control','placeholder'=>''])}}

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
                                    {{Form::text('city',old('city', isset($getUserDetails) ? $getUserDetails->city : ''),['class' => 'form-control','placeholder'=>''])}}

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
                                    {{Form::text('state',old('state', isset($getUserDetails) ? $getUserDetails->state : ''),['class' => 'form-control','placeholder'=>''])}}

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

                            {!!form::select('country_id',$country,isset($getUserDetails) ? $getUserDetails->country_id : '',['class'=>'form-control m-b','id'=>'country','placeholder'=>'Select Country'])!!}

                            @if ($errors->has('country_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                  

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            {{Form::label('status', trans('dashboard.status'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2" >                                                  
                                    {!!form::select('status',['1'=>'Active','0'=>'Inactive'],isset($user_details) ? $user_details->status: "",['class'=>'form-control chosen-select m-b','tabindex'=>'2'])!!}

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                    @endif

                                </div>
                        </div>        


                       

                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                @if(!empty($userinfo))
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
    
    if($('#user_personal_details_id').val() != ''){
            
        $('.getlogo span').text($('#company_logo').val());
         //$("#nofile").removeClass("fileinput-new");
         // $("#file-exists").addClass("fileinput-exists");
      // }else if($('#user_personal_details_id').val() == ''){
         // $("#nofile").addClass("fileinput-new");
         //   $("#file-exists").removeClass("fileinput-exists");
       }

 });

 setInterval(function() {
  // method to be executed;
  $('#company_logo').val($('.getlogo span').text());
}, 3000);
</script>
@endsection       

