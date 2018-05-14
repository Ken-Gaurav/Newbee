@extends('layouts.admin.default')

@section('styles')
   
@endsection

@section('header')
     <div class="row">
        <div class="col-lg-12">
         <h3><i class="fa fa-edit"></i> Users</h3>
           
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
             
                <li>
                    <i class="fa fa-edit"></i>
                    <a><span class="nav-label">Users Lists</span></a>
                </li>
                @php
                        $getid=$latestId->id+1;
                        
                @endphp
          <span class="pull-right"><a href="{{ action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getPersonaldetails',[$getid]) }}"><span class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add International Branch User</span></a></sapn>
                                
            </ol>
        </div>

    </div>
@endsection

@section('content')
<div class="wrapper wrapper-content animated fadeIn">
  
       <div class="row">

             @foreach($AdminDetail as $userdata)
             <div class="col-lg-4">
              <div class="ibox">
                <div class="ibox-content">
                                 <center>
                                  <div class="m-t-xs btn-group">
                                      <a href="{{ action('Admin\InternationalBranch\AdminDetails_Permission_Controller@anyActive',[$userdata->id]) }}" class="act btn btn-outline btn-success btn-sm btn-rounded btn-white '@if($userdata->status==1)' btn-primary"><i class="fa fa-check-square-o">@else<i class="fa fa-square-o">@endif</i> Active </a>
                                      <a href="{{ action('Admin\InternationalBranch\AdminDetails_Permission_Controller@anyInactive',[$userdata->id]) }}" class="inact btn btn-outline btn-danger btn-sm btn-rounded btn-white '@if($userdata->status==0)' btn-white"><i class="fa fa-check-square-o">@else<i class="fa fa-square-o">@endif</i> Inactive</a>
                                      
                                   </div>
                                   <div class="m-t-xs btn-group pull-right">
                                     <a href="{{ action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getDelete',[$userdata->id]) }}" class="btn btn-outline btn-danger btn-sm btn-rounded btn-white"><i class="fa fa-trash-o"></i></a>
                                   </div>
                                 </center> 
                                 <hr style=" border-width: 2px; border-style: inset;">
                                     <center>
                                      <div class="col-sm-4">
                                        <div class="text-center">
                                           {{ Html::image('/company_logo/'.$userdata->company_logo, 'a picture', array('class' => 'img m-t-x img-responsive')) }}
                                            <div class="m-t-xs font-bold"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <h3><strong><i class="fa fa-user"></i>  {{$userdata->name}}</strong></h3>
                                        <p><i class="fa fa-envelope-o"></i><strong>  {{$userdata->email}}</strong></p>
                                       <strong><i class="fa fa-flag"></i>  {{$userdata->country_name}}</strong>
                                       
                                    </div>
                                    </center> 
                                   
                                  <center>
                                    <div class="m-t-xs btn-group">
                                      <hr style=" border-width: 2px; border-style: inset;">
                                        <a href="{{ action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getPermission',[$userdata->id]) }}" class="btn  btn-outline btn-success btn-sm btn-rounded btn-white"><i class="fa fa-lock"></i>Permission</a>
                                        <a href="{{ action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getAdminGressDetails',[$userdata->id]) }}" class="btn btn-outline btn-success btn-sm btn-rounded btn-white"><i class="fa fa-steam"></i>Gress & T&C</a>
                                        <a  href="\GetEmployee\{{$userdata->id}}" class="btn btn-success btn-sm btn-rounded btn-white btn-outline"><i class="fa fa-group"></i> Employees</a>
                                        <a  href="{{ action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getPersonaldetails',[$userdata->id]) }}" class="btn btn-outline btn-success btn-sm btn-rounded btn-white"><i class="fa fa-folder"></i> Personal Info</a>
                                    </div>
                                   </center>
                    
                    </div>
                </div>
            </div>

               @endforeach      
             
      </div>
          
  </div>
 <style>
 .panel-Branch > .panel-heading {
    background-color: #2f4050;
    border-color: #1c84c6;
    color: #ffffff;
}
 </style>  
 <script>
        $(document).ready(function () {
          
        afterDeleteSuccess = function (response) {
                if(typeof response.error != 'undefined') {
                    toastr["error"](response.error, "{!! trans('dashboard.error') !!}");
                } else {
                    toastr["success"]("{!! trans('dashboard.user_deleted_success_msg') !!}", "{!! trans('dashboard.success') !!}");
                }
                // Redraw grid after success
                if($dataTable !== null) {
                    $dataTable.draw();
                }
            };
            afterDeleteError = function () {
                toastr["error"]("{!! trans('dashboard.Success_msg') !!}", "{!! trans('dashboard.Success_msg') !!}");
                $('#accessorieTable').DataTable().draw();
            }
        })
   



</script>
 
@endsection

@section('footer_scripts')

@endsection