@extends('layouts.admin.default')

@section('styles')

@endsection

@section('header')
     <div class="row">
        <div class="col-lg-12">
         <h3><i class="fa fa-edit"></i> Product Volume </h3>
           
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a href="{{ action('Admin\Product\Printing_effectController@getIndex') }}" ><span class="nav-label">Product Volume List</span></a>
                </li>
                <li>
                    <i class="fa fa-edit"></i>
                    <a><span class="nav-label">Product Volume Detail</span></a>
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
                    <h5>{{ trans('dashboard.printing_effect_details') }}</h5>
                </div>
                <div class="ibox-content">
                    <div class="card-box">
                      
                        

                    <form class="form-horizontal blog-form" role="form" method="POST" action="{{action('Admin\Product\Product_volume_Controller@postSave') }}" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                         {{ Form::hidden('product_volume_id', isset($product_volumed_data) ? $product_volumed_data->product_volume_id : '') }}

                         {{ Form::hidden('checkboxstatus','',['id'=>'chkstatus']) }}


                         <div class="form-group">

                                        {{Form::label('Want to Add Uk Volume ?','Want to Add Uk Volume ?',['class' => 'col-md-2 control-label'])}}
                                         <div class="col-lg-4">
                                            <div class="i-checks">
                                            {{ Form::checkbox('bedStatus', 'Yes',['class'=>'iradio_square-green'],array('id'=>'uk')) }}&emsp; {{ Form::label('','Yes') }}
                                            </div>
                                     </div>
                                  </div>


                        <div class="form-group">
                            {{Form::label('volume','Volume',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('volume',old('volume', isset($product_volumed_data) ? $product_volumed_data->volume : ''),['class' => 'form-control','placeholder'=>'volume','required'=>'required'])}}

                                    @if ($errors->has('volume'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('volume') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                       
                        <div class="form-group{{ $errors->has('currency_code') ? ' has-error' : '' }}">
                            {{Form::label('measurement','Measurement',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2" >                                                  
                                    {!!form::select('measurement',$measurement,isset($product_volumed_data->primary_measurement_id) ? $product_volumed_data->primary_measurement_id: "",['class'=>'form-control m-b'])!!}

                                    @if ($errors->has('measurement'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('measurement') }}</strong>
                                            </span>
                                    @endif
                                    

                                </div>
                        </div>

                         <div id="uk_volume" style="display:none;">
                        <div class="form-group">
                            {{Form::label('Uk Volume','Uk Volume',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::text('uk_volume',old('uk_volume', isset($product_volumed_data) ? $product_volumed_data->uk_volume : ''),['class' => 'form-control','placeholder'=>'uk volume','id'=>'ukv'])}}

                                    @if ($errors->has('volume'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('volume') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('ukmeasurement') ? ' has-error' : '' }}">
                            {{Form::label('ukmeasurement','Uk Measurement',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2" >                                                  
                                    {!!form::select('ukmeasurement',$measurement,isset($product_volumed_data->secondary_measurement_id) ? $product_volumed_data->secondary_measurement_id: "",['class'=>'form-control m-b'])!!}

                                    @if ($errors->has('ukmeasurement'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('ukmeasurement') }}</strong>
                                            </span>
                                    @endif
                                    

                                </div>
                        </div>

                        
                       </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            {{Form::label('status', trans('dashboard.status'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2" >                                                  
                                    {!!form::select('status',['1'=>'Active','0'=>'Inactive'],isset($product_volumed_data) ? $product_volumed_data->status: "",['class'=>'form-control m-b'])!!}

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                    @endif

                                </div>
                        </div>        

                        <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                   @if(!empty($product_volumed_data))
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
<script type="text/javascript">
$(document).ready(function() {
    $('#uk').iCheck('uncheck');
    $('#chkstatus').val(0);
    $('input').on('ifChecked', function (event){ 
        $('#uk_volume').css('display','inline');
        $('#chkstatus').val(1);
    });
    $('input').on('ifUnchecked', function (event){ 
        $('#uk_volume').css('display','none');
        $('#chkstatus').val(0);
    });
if($('#ukv').val() != ''){
    // alert($('#ukv').val());
      $('#uk').iCheck('check');
}else{

}    
});
</script>
@endsection