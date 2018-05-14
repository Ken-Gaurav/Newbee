@extends('layouts.admin.default')
@section('header')
     <div class="row">
        <div class="col-lg-12">
         <h3><i class="fa fa-edit"></i> {{ trans('dashboard.Job') }}</h3>
           
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a href="{{ action('Admin\Production\product_item_info_controller@getIndex') }}" ><span class="nav-label">{{ trans('dashboard.Job') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-edit"></i>
                    <a><span class="nav-label">{{ trans('dashboard.Add_Job') }}</span></a>
                </li>
                
            </ol>
        </div>
    </div>
@endsection

@section('content')
    
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="card-box">
                <form class="form-horizontal blog-form" role="form" method="POST" action="{{ action('Admin\Production\product_item_info_controller@postSave') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{ Form::hidden('job_id', isset($job) ? $job->job_id : '') }}

                   
                   <div class="form-group{{ $errors->has('inward_no') ? ' has-error' : '' }}">
                        {{Form::label('Job_No', trans('dashboard.Job_No'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-6">

                             @php
                                if(empty($job)){
                                    $latest_no=0;
                                    
                                    
                                    $strpad = str_pad($latest_no+1,3,'0',STR_PAD_LEFT); }
                                @endphp

                            {{Form::text('job_no',isset($job) ? $job->job_no: 'JOB'.$strpad,['class' => 'form-control','readonly','placeholder'=>'Job_no','required'=>'required'])}}
                            @if ($errors->has('Job_No'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('Job_No') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="form-group{{ $errors->has('job_name') ? ' has-error' : '' }}">
                        {{Form::label('Job_Name', trans('dashboard.Job_Name'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-6">
                            {{Form::text('job_name',old('job_name', isset($job) ? $job->job_name : ''),['class' => 'form-control','placeholder'=>'Job name','required'=>'required'])}}
                            @if ($errors->has('job_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('job_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="form-group">
                            {{Form::label('Type_Of_Pouch', trans('dashboard.Type_Of_Pouch'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-2">
                                <div class="i-checks">
                                {{ Form::radio('pouch_type', 'stock',isset($job) ? $job->pouch_type== 'stock' : '',['class'=>'iradio_square-green']) }}  {{ Form::label('','Stock') }}<br>
                                {{ Form::radio('pouch_type','Custom',isset($job) ? $job->pouch_type== 'Custom' : '',['class'=>'iradio_square-green'])}}  {{ Form::label('', 'Custom') }}

                            </div>
                        </div>
                    </div>


                    
                    <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                        {{Form::label('country', trans('dashboard.country'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-6">

                            {!!form::select('country_id',$country,isset($job) ? $job->country_id : '',['class'=>'form-control m-b','id'=>'country','placeholder'=>'Select Country'])!!}

                            @if ($errors->has('country_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div id='user' style="display:none" >
                    <div class="form-group{{ $errors->has('user_details') ? ' has-error' : '' }}">
                        {{Form::label('User_Detail', trans('dashboard.User_Detail'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-6">

                            {!!form::select('user_details',$user,isset($job) ? $job->user_details : '',['class'=>'form-control m-b','id'=>'country','placeholder'=>'Select User'])!!}

                            @if ($errors->has('user_details'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_details') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    </div>


                    
                    <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
                        {{Form::label('Select_Product', trans('dashboard.Select_Product'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-6">

                            {!!form::select('product',$product,isset($job) ? $job->product : '',['class'=>'form-control m-b','id'=>'product_category','placeholder'=>'Select Product','id'=>'product'])!!}

                            @if ($errors->has('product'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('product') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div id='size' style="display:none" >
                    <div class="form-group{{ $errors->has('size_product') ? ' has-error' : '' }}">
                        {{Form::label('Select_Size', trans('dashboard.Select_Size'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-6">

                            {!!form::select('size_product',['0'=>'select'] ,isset($job) ? $job->size_product : '',['class'=>'form-control m-b','id'=>'product_size','placeholder'=>'Select Size'])!!}

                            @if ($errors->has('size_product'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('size_product') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    </div>

                    <div class="form-group{{ $errors->has('printing_option') ? ' has-error' : '' }}">
                        {{Form::label('Printing_Option', trans('dashboard.Printing_Option'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-3">

                            {!!form::select('printing_option',$ptr,isset($job) ? $job->printing_option : '',['class'=>'form-control m-b','id'=>'product_category','placeholder'=>'Select Printing Option'])!!}

                            @if ($errors->has('printing_option'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('printing_option') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                   


                    <div class="form-group{{ $errors->has('layers') ? ' has-error' : '' }}">
                        {{Form::label('Layer', trans('dashboard.Layer'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-3" id='layer'>

                             <select name="layers" id='layer' class="form-control m-b">
                                @for($i=1;$i<=5;$i++)
                                <option value="{{$i}}" @php isset($job) ? $job->layers : ''@endphp> {{$i}}</option>
                                @endfor
                            </select>
                            
                            
                            @if ($errors->has('layers'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('layers') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="form-group{{ $errors->has('material') ? ' has-error' : '' }}">
                        {{Form::label('Material', trans('dashboard.Material'),['class' => 'col-md-4 control-label'])}}

                        <div class="col-md-6">
                            <table class="table table-bordered" id="material">
                                <thead>
                                    <tr>
                                        <th>Layer#</th>
                                        <th>Material</th>
                                    </tr>
                                </thead>
                                <tbody class="test">
                                    
                                    
                                   
                                </tbody>
                            </table>
                        </div>

                    </div>

                 

                    <div class="form-group{{ $errors->has('cylinder') ? ' has-error' : '' }}">
                        {{Form::label('Cylinder', trans('dashboard.Cylinder'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-6">
                            <select name="cylinder" id="cylinder" class="form-control m-b">
                               <option value="0">Select Cylinder</option> 
                              
                                 @for($i=1;$i<=10;$i++)
                                <option value="{{$i}}" @php isset($job) ? $job->cylider : ''@endphp> {{$i}}</option>
                                @endfor
                            </select>
                            
                            @if ($errors->has('cylinder'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cylinder') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('manufacturing_process') ? ' has-error' : '' }}">
                        {{Form::label('Manufacturing_Process', trans('dashboard.Manufacturing_Process'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-6">

                            {!!form::select('manufacturing_process',$process,isset($job) ? $job->manufacturing_process : '',['class'=>'form-control m-b','id'=>'product_category','placeholder'=>'Select Manufacturing Process'])!!}

                            @if ($errors->has('manufacturing_process'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('manufacturing_process') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {{Form::label('status', trans('dashboard.status'),['class' => 'col-md-4 control-label'])}}
                        <div class="col-md-6">
                            {!!form::select('status',['0'=>'Inactive','1'=>'Active'],isset($job) ? $job->status : "",['class'=>'form-control m-b'])!!}
                            @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            @if(!empty($job))
                                <button type="submit" class="btn btn-primary">Update</button>
                                {!! link_to(url()->previous(), 'Cancel', ['class' => 'btn btn-white']) !!}
                            @else
                                <button type="submit" class="btn btn-primary">Submit</button>
                                {!! link_to(url()->previous(), 'Cancel', ['class' => 'btn btn-white']) !!}
                            @endif
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script id="file-content-template" type="x-tmpl">
    </script>
    <script type="text/javascript">
     jQuery(document).ready(function(){
           $("#country").change();
        });

            $("#country").change(function() {
        //    alert('hiiii');
            var optionvalue=$('select[name=country_id]').val();
        //alert(optionvalue);
            if(optionvalue==10){
               // alert(optionvalue);    
            $('#user').css('display','inline');
            }else{
            $('#user').css('display','none');
        }
            
        });

$("#product").change(function() {
        
            $('div #size').css('display','inline');

            var optionvalue = $(this).val();
            
            if(optionvalue) {
                
                $.ajax({

                    url: '/form/ajax/'+optionvalue,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        //alert(optionvalue);
                        $('#product_size').empty();
                        $('#product_size').append('<option value="0">Select</option>');
                            $.each(data, function(key, value) {
                            $('#product_size').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                }//success end

                });//1st ajax
                                      
            }
            else {
                $('#product_size').empty();
                
            }
        });
        




     $('#checkAll').click(function(){

     if ($(this).val() == 'SelectAll') {
        
            //alert();
              $('.icheckbox_square-green').addClass('checked');              
              $('.button').prop('checked', true);
                $(this).val('UnselectAll');
            } else {
                $('.icheckbox_square-green').removeClass("checked");
                $('.button').prop('checked', false);
                $(this).val('SelectAll');
            }
    });

    //  $(function () {
    // $("#layer").bind("change", function () {
    //     var div = $("<div />");
    //     div.html(GetThikness(""));
    //     $("#TextBoxContainer1").append(div);
    // });

    // });
     // function GetThikness(value) {
     //    var i = $('#layer option:selected').val();
     //    alert(i);
        
     //   return '<tr><td>Layer</td><td>{!!form::select("material",$material,isset($job) ? $job->material : '',["class"=>"form-control m-b","id"=>"product_category","placeholder"=>"Select Material"])!!}</td></tr>';
        
        
     //    src = "{{URL::action('Admin\Production\Job_Master_Controller@getMaterial') }}";
        
     //    $.ajax({
     //            type: "POST",
     //            url: src,                  
     //            data:{layers:layers},
     //            success: function(json) {
                    
     //            }
     //        });
     
     // }


      $('[name="layers"]').change(function(){
        var i = $(this).val();
        alert(i);

       for($j=1;$j<=i;$j++){
                
        $("#material > tbody").append('<tr><td>Layer</td><td>{!!form::select("material",$material,isset($job) ? $job->material : '',["class"=>"form-control m-b","id"=>"product_category","placeholder"=>"Select Material"])!!}</td></tr>');
       $("#material > tbody").show();
       }
$(".test").hide();

    });
    

    

    </script>
<script>
    $(document).ready(function () {
    
    $('.i-checkss').iCheck({
     checkboxClass: 'icheckbox_square-green2',
     radioClass: 'iradio_square-green',
     });
    $('.i-checks').iCheck({
     checkboxClass: 'icheckbox_square-green',
     radioClass: 'iradio_square-green',
     });
     });
   
</script> 
    


@endsection