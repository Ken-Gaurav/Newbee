
@extends('layouts.admin.default')

@section('styles')

    <style>
        
    </style>
@endsection

@section('header')
     <div class="row">
        <div class="col-lg-12">
         <h3><i class="fa fa-edit"></i> {{ trans('dashboard.size') }}</h3>
           
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a href="{{ action('Admin\Product\Size_master_Controller@getIndex') }}" ><span class="nav-label">{{ trans('dashboard.size_list') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-edit"></i>
                    <a><span class="nav-label">{{ trans('dashboard.size_detail') }}</span></a>
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
                    <h5>{{ trans('dashboard.size_detail') }}</h5>
                </div>
                <div class="ibox-content">
                     <div class="card-box">
                                                       
                        
                    <form class="form-horizontal blog-form" role="form" method="POST" action="{{ action('Admin\Product\Size_master_Controller@postSave') }}" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                        
                        <div class="row">
                            {{Form::label('', trans('Product Name'),['class' => 'col-md-5 control-label'])}}
                                <div class="col-lg-6">

                                   {{Form::label('product_name',old('product_name', isset($product_name) ? $product_name->product_name : ''),['class' => 'col-md-5 control-label','placeholder'=>'','required'=>'required'])}}
  
                                
                                </div>                            
                        </div><br>
                       


                <div class="ibox-content m-b-sm border-bottom">
                <div class="row">

                        <div class="form-group">
                            
                            <div class="col-lg-12">
                                <div class="row">
                                
                                    <div class="col-lg-3">

                                    {{Form::label('zipper', trans('dashboard.size_zipper'),['class' => 'col-md-3 control-label'])}}

                                    </div>
                                    <div class="col-lg-2">
                                        
                                        {{Form::label('volume', trans('dashboard.size_volume'),['class' => 'col-md-3 control-label'])}}

                                    </div>
                                    <div class="col-lg-2">
                                    
                                        {{Form::label('width', trans('dashboard.size_width'),['class' => 'col-md-3 control-label'])}}

                                    </div>
                                    <div class="col-lg-2">
                                        
                                        {{Form::label('height', trans('dashboard.size_height'),['class' => 'col-md-3 control-label'])}}

                                    </div>

                                    @if($product_name->gusset_available == 1)
                                    <div class="col-lg-2">
                                        
                                        {{Form::label('gusset', trans('dashboard.size_gusset'),['class' => 'col-md-3 control-label'])}}

                                    </div>

                                    @elseif($product_name->weight_available == 1)
                                    <div class="col-lg-2">
                                        
                                        {{Form::label('weight', trans('dashboard.size_weight'),['class' => 'col-md-3 control-label'])}}

                                    </div>
                                    @else
                                    @endif
                                    

                                    <button  type="button" id="btnAdd" value="" class="btn btn-circle btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></button>

                                </div>
                            </div><br><br>
                            
                            
  
                             @if(count($size_master) > 0)
                            
                                 @foreach($size_master as $size_master)

                             
                   
                        
                            <div class="col-lg-12">
                                <div class="row" id=""> 

                                    {{ Form::hidden('size_master_id[]', isset($size_master) ? $size_master->size_master_id : '') }}
                                     {{ Form::hidden('product_id[]', isset($size_master) ? $size_master->product_id : '') }}

                                    <div class="col-lg-3">                                                
                                        {!!form::select('zipper[]',(['' => 'select zipper'] + $product),isset($size_master) ? $size_master->product_zipper_id: "",['class'=>'form-control m-b'])!!}

                                        @if ($errors->has('zipper'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('zipper') }}</strong>
                                                </span>
                                        @endif

                                    </div> 

                                    <div class="col-lg-2">
                                    {{Form::text('volume[]', isset($size_master) ? $size_master->volume : '',['class' => 'form-control','required'=>'required'])}}    
                                    </div>

                                    <div class="col-lg-2">
                                    {{Form::text('width[]',isset($size_master) ? $size_master->width : '',['class' => 'form-control','required'=>'required'])}}
                                        
                                    </div>
                                    <div class="col-lg-2">
                                    {{Form::text('height[]',isset($size_master) ? $size_master->height : '',['class' => 'form-control','required'=>'required'])}}
                                    </div>

                                     @if($size_master->gusset_available == 1)

                                    <div class="col-lg-2">
                                    {{Form::text('gusset[]',isset($size_master) ? $size_master->gusset : '',['class' => 'form-control','required'=>'required'])}}
                                    </div>

                                    @elseif($size_master->weight_available == 1)

                                    <div class="col-lg-2">
                                    {{Form::text('weight[]',isset($size_master) ? $size_master->weight : '',['class' => 'form-control','required'=>'required'])}}
                                    </div>

                                    @else


                                    @endif

                                    
                                    <button  type="button" value="{{$size_master->size_master_id}}" class="remove btn btn-circle btn btn-warning"><i class="fa fa-minus" aria-hidden="true"></i></button>

                                  
                                    
                                    {{ Form::hidden('hdn_addcount','7',['id'=>'hdn_addcount']) }}
                                    
                                </div>
                            </div>

                              @endforeach
                           @else  
                          
                                <div class="col-lg-12">
                                <div class="row" id=""> 
                                {{ Form::hidden('size_master_id[]', isset($size_master) ? '': '') }}
                                {{ Form::hidden('product_id[]', isset($product_name) ? $product_name->product_id : '') }}

                                    <div class="col-lg-3">                                                  
                                        {!!form::select('zipper[]',(['' => 'select zipper'] + $product),'',['class'=>'form-control m-b'])!!}

                                        @if ($errors->has('zipper'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('zipper') }}</strong>
                                                </span>
                                        @endif

                                    </div> 

                                    <div class="col-lg-2">
                                    {{Form::text('volume[]',old('volume', isset($size_master) ? '' : ''),['class' => 'form-control','placeholder'=>'volume','required'=>'required'])}}
                                       
                                    </div>

                                    <div class="col-lg-2">
                                    {{Form::text('width[]',isset($size_master) ? '' : '',['class' => 'form-control','required'=>'required'])}}
                                        
                                    </div>
                                    <div class="col-lg-2">
                                    {{Form::text('height[]',isset($size_master) ? '' : '',['class' => 'form-control','required'=>'required'])}}
                                    </div>

                                    @if($product_name->gusset_available == 1)

                                    <div class="col-lg-2">
                                    {{Form::text('gusset[]',isset($size_master) ? '' : '',['class' => 'form-control','required'=>'required'])}}
                                    </div>

                                    @elseif($product_name->weight_available == 1)

                                    <div class="col-lg-2">
                                    {{Form::text('weight[]',isset($size_master) ? '' : '',['class' => 'form-control','required'=>'required'])}}
                                    </div>

                                    @else


                                    @endif
                                    <button type="button" value="" class="remove btn btn-circle btn btn-warning"><i class="fa fa-minus" aria-hidden="true"></i></button>

                                   

                                    
                                    {{ Form::hidden('hdn_addcount','7',['id'=>'hdn_addcount']) }}
                                    
                                </div>
                            </div>
                            
                            
                            @endif
                            
                               <div id="TextBoxContainer">
                            <!--Textboxes will be added here -->
                        </div>                       
                        </div>

                        

                        

            

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8"> 
                            
                                <button type="submit" class="btn btn-primary">Update</button>
                                
                                {!! link_to(url()->previous(), 'Cancel', ['class' => 'btn btn-white']) !!}
                            
                            </div>
                    </div>     
                    
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

 

$(function () {
    $("#btnAdd").bind("click", function () {
        var div = $("<div />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer").append(div);
    });
    $("#btnGet").bind("click", function () {
        var values = "";
        $("input[name=sizemaster]").each(function () {
            values += $(this).val() + "\n";
        });
        //alert(values);
    });

    $("body").on("click", "#delete", function () {
        $(this).closest("div").remove();
    });

    $(".remove").on("click",function () {
       // $(this).closest("div").remove();
       del_values = $(this).val();
        //alert(del_values);

        $.ajax({
                    "url": '{!! action("Admin\Product\Size_master_Controller@getRemove") !!}',
                    async: false,
                    type: 'GET',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {del_values:del_values},

                    
                    success: function (data) {
                        if (data['success']) {

                                setTimeout(function () {
                                       
                                 toastr["success"]("{!! trans('dashboard.user_deleted_success_msg') !!}", "{!! trans('dashboard.success') !!}");
                                 

                            },0);
                                window.location.reload(); 
                            
                             
                        }  else {
                            setTimeout(function () {
                                alert("There is something wrong");
//                                 next();
                            }, 1000);
                            return false;
                        }
                    }

                });
    });
});

function GetDynamicTextBox(value) {
   
    var count = parseInt($(".sizemaster").size())+1;

    return '<div class="col-lg-12">'+'<div class="row" id="div">'
    
    +'{{Form::hidden("size_master_id[]", isset($size_master) ? "":"",["class" => "form-control"])}}'
    +'{{Form::hidden("product_id[]", isset($product_name) ? $product_name->product_id:"",["class" => "form-control","required"=>"required"])}}'
    +'<div class="sizemaster col-lg-3 " id="sizemaster_'+count+'">'
    +'{{form::select("zipper[]",$product,isset($size_master) ? "":"",["class"=>"form-control m-b"])}}'
    +'</div>' 
    +'<div class="sizemaster col-lg-2" id="sizemaster_'+count+'">'
    +'{{Form::text("volume[]", isset($size_master) ? "":"",["class" => "form-control","required"=>"required"])}}'
    +'</div>'
    +'<div class="sizemaster col-lg-2" id="sizemaster_'+count+'">'
    +'{{Form::text("width[]", isset($size_master) ? "":"",["class" => "form-control","required"=>"required"])}}'
    +'</div>'
    +'<div class="sizemaster col-lg-2" id="sizemaster_'+count+'">'
    +'{{Form::text("height[]", isset($size_master) ? "":"",["class" => "form-control","required"=>"required"])}}'
    +'</div>'
    +'@php if($product_name->gusset_available == 1){ @endphp'
    +'<div class="sizemaster col-lg-2" id="sizemaster_'+count+'">'
    +'{{Form::text("gusset[]", isset($size_master) ? "":"",["class" => "form-control","required"=>"required"])}}'
    +'</div>'
    +'@php }elseif($product_name->weight_available == 1){ @endphp'
    +'<div class="sizemaster col-lg-2" id="sizemaster_'+count+'">'
    +'{{Form::text("weight[]", isset($size_master) ? "":"",["class" => "form-control","required"=>"required"])}}'
    +'</div>'
    +'@php }else{} @endphp'
    +'<button type="button" id="delete" value="" class="remove btn btn-circle btn btn-warning"><i class="fa fa-minus" aria-hidden="true"></i></button></div>'+'</div>'
       
    
            }
</script>
 
@endsection