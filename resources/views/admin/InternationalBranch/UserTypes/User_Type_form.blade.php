@extends('layouts.admin.default')

@section('styles')

@endsection

@section('header')
     <div class="row">
        <div class="col-lg-12">
         <h3><i class="fa fa-edit"></i> User Types</h3>
           
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a href="{{ action('Admin\Product\Product_MakeController@getIndex') }}" ><span class="nav-label">User Type List</span></a>
                </li>
                <li>
                    <i class="fa fa-edit"></i>
                    <a><span class="nav-label">User type Details</span></a>
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
                    <h5>User type Details</h5>
                </div>
                <div class="ibox-content">
                    <div class="card-box">
                    
                    <form class="form-horizontal blog-form" role="form" method="POST" action="{{action('Admin\InternationalBranch\Usertype_controller@postSave') }}" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                         {{ Form::hidden('user_type_id', isset($usertypedetails) ? $usertypedetails->user_type_id : '') }}
                        <div class="form-group">
                            {{Form::label('name','Name',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-6">
                                    {{Form::text('name',old('name', isset($usertypedetails) ? $usertypedetails->name : ''),['class' => 'form-control','placeholder'=>'','required'=>'required'])}}

                                    @if ($errors->has('name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                       
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            {{Form::label('status', trans('dashboard.status'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2" >                                                  
                                    {!!form::select('status',['1'=>'Active','0'=>'Inactive'],isset($usertypedetails->make_id) ? $usertypedetails->status: "",['class'=>'form-control m-b'])!!}

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                    @endif

                                </div>
                        </div>        

                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                    @if(!empty($usertypedetails))
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

@endsection