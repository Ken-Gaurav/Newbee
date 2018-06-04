@extends('layouts.admin.default')

@section('styles') 
@endsection

@section('header')
     <div class="row">
        <div class="col-lg-12">
            <h2>{{ trans('dashboard.product_material') }}</h2>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href=""><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a href="{{ action('Admin\Product\Product_MaterialController@getIndex') }}" ><span class="nav-label">{{ trans('dashboard.product_material_list') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-edit"></i>
                    <a><span class="nav-label">{{ trans('dashboard.product_material_details') }}</span></a>
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
                    <h5>{{ trans('dashboard.product_material_details') }}</h5>
                </div>
                <div class="ibox-content">
                    <div class="card-box">
                     
                    <form class="form-horizontal blog-form" role="form" method="POST" action="{{ action('Admin\Product\Product_MaterialController@postSave') }}" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                         {{ Form::hidden('product_material_id', isset($product_material_data) ? $product_material_data->product_material_id : '') }}
                         {{ Form::hidden('product_material_thickness_id', isset($product_material_thickness_data) ? '' : '') }}

                        <div class="form-group{{ $errors->has('mname') ? ' has-error' : '' }} ">
                            {{Form::label('material_name', trans('dashboard.material_name'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-6">

                                    {{Form::text('material_name',old('mname', isset($product_material_data) ? $product_material_data->material_name : ''),['class' => 'form-control','placeholder'=>'Material Name','required'=>'required'])}}
                                    @if ($errors->has('mname'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('material_name') }}</strong>
                                                </span>
                                    @endif

                                </div>
                        </div>

                        
                       <div class="form-group{{ $errors->has('product_layer_id') ? ' has-error' : '' }}">
                        {{Form::label('slayer', trans('dashboard.slayer'),['class' => 'col-md-2 control-label'])}} 
                        <div class="col-md-5">
                        <div class="panel panel-default">                                     
                        <div class="panel-body">
                        <div class="i-checkss">
                         
                                @foreach ($Product_layer as $Product_layer)
                        
                                      @if(isset($product_material_data))
                             

                                        @php $key=explode(',',$product_material_data->layers) @endphp

                                            @if(in_array($Product_layer->product_layer_id ,$key))
                                        {{ Form::checkbox('layers[]', $Product_layer->product_layer_id,true,['class'=>'check_layer','id'=>'checkbox1']) }}

                                    @else
                                      {{ Form::checkbox('layers[]', $Product_layer->product_layer_id,false,['class'=>'check_layer','id'=>'checkbox1']) }}
                                    @endif
                                 @else
                                        {{ Form::checkbox('layers[]', $Product_layer->product_layer_id,null,['class'=>'check_layer','id'=>'checkbox1']) }}
                                  @endif
                                          &emsp;{{ Form::label('layer', $Product_layer->layer) }}<br><br>
                                @endforeach
                                
                            @if ($errors->has('layer'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('layers') }}</strong>
                                </span>
                            @endif

                        </div>

                     </div>


                              
                        </div>
                        </div>    
                    </div>

                        <div class="form-group">
                            {{Form::label('gsm', trans('dashboard.gsm'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-6">
                                    {{Form::text('gsm',old('gsm', isset($product_material_data) ? $product_material_data->gsm : ''),['class' => 'form-control','required'=>'required'])}}

                                    @if ($errors->has('gsm'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('gsm') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('min_product', trans('dashboard.min_product'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-3">
                                    {{Form::text('minimum_product_quo',old('minimum_product_quo', isset($product_material_data) ? $product_material_data->minimum_product_quo : ''),['class' => 'form-control','required'=>'required'])}}

                                    @if ($errors->has('minimum_product_quo'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('minimum_product_quo') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>


                    


                        <div class="form-group" >
                            {{Form::label('thickness',trans('dashboard.thickness'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-3">
                                   
                                   @if(!isset($product_material_data->thickness))
                                    {{Form::text('thickness[]',old('thickness', isset($product_material_data) ? $product_material_data->thickness : ''),['placeholder'=>'Thickness','class' => 'form-control','required'=>'required'])}}
                                   @endif 
                                    @if ($errors->has('thickness'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('thickness') }}</strong>
                                                    </span>
                                    @endif

                                </div> 


                                <button type="button"  value="+"  id="thik" class="btn btn-circle btn-primary add_more_button" title="Add Profit"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                        <div>
                         @if(isset($product_material_data))

                              @php 
                               $i=0;
                               $getThickness=explode('|',$product_material_data->thickness);  
                                @endphp
                            @foreach($getThickness as $thickness)
                            @php  $i++;  @endphp 
                               
                            <div class="form-group" id="edit_thick_{{$i}}" >
                                 {{Form::label('','',['class' => 'col-md-2 control-label'])}}
                              <div class="col-lg-3" >
                                    {{Form::text('thickness[]',old('thickness', isset($thickness) ? $thickness : ''),['placeholder'=>'Thickness','class' => 'edit_thick.$i  form-control','required'=>'required'])}}

                               </div> <button type="button"  value="edit_thick_{{$i}}"  id="remove_edit_thick" class="btn btn-circle btn-danger add_more_button" title="Add Profit"><i class="fa fa-minus" aria-hidden="true"></i></button>
                             </div>   

                            @endforeach



                       @endif
                      </div>
                     
                       <div  id="add_thickness">

                       </div>
                   


                          <div class="form-group">
                            {{Form::label('Thickness Price', trans('dashboard.thickness_price'),['class' => 'col-md-2 control-label','for'=>'example-text-input'])}}
                            
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-sm-3">
                                        {{Form::label('Form Thickness',trans('dashboard.form_thickness')) }}
                                    </div>
                                    <div class="col-lg-3">
                                        {{Form::label('To Thickness',trans('dashboard.to_thickness')) }}
                                    </div>
                                    <div class="col-lg-3">
                                        {{Form::label('Price / Kg',trans('dashboard.pkg')) }}
                                    </div>
                                </div>
                            </div><br>

                        <div class="col-lg-6" >
                                <div class="row">
                                    <div class="col-sm-3">
                                      {{ Form::hidden('product_material_thickness_id[]','') }}
                                     @if(!isset($product_material_thickness_data)) 
                                    {{Form::text('thickness_form[]',isset($product_material) ? $product_material->thickness_form : '',['class' => 'form-control','required'=>'required','id'=>'form_1'])}}    
                                    @endif

                                    </div>

                                    <div class="col-lg-3">
                                   
                                       @if(!isset($product_material_thickness_data)) 
                                    {{Form::text('thickness_to[]',old('thickness_to[]', isset($product_material) ? $product_material->thickness_to : ''),['class' => 'form-control','required'=>'required','id'=>'to_1'])}}
                                       @endif

                                    </div>
                                    <div class="col-lg-3">
                                    
                                       @if(!isset($product_material_thickness_data)) 
                                    {{Form::text('thickness_price[]',old('thickness_price[]', isset($product_material) ? $product_material->thickness_price : ''),['class' => 'form-control','required'=>'required','id'=>'price_1'])}}
                                     @endif

                                    </div>

                                    <div class="col-lg-3">
                                         <!-- <button id="btnAdd1" type="button" value="+" class="btn btn-circle btn-primary add_more_button"/><i class="fa fa-plus" aria-hidden="true"></i></button> -->

                                          <button type="button"  value="+"  id="thicknessprice" class="btn btn-circle btn-primary add_more_button" title="Add Profit"><i class="fa fa-plus" aria-hidden="true"></i></button>

                                                                           
                                    </div>
                                   
                                    
                                </div>
                          </div>
                        </div>   
                         
                            @if(isset($product_material_thickness_data))

                                 @php  $i=0;     @endphp

                                    @foreach($product_material_thickness_data as $product_material_thickness_data)
                                    @php  $i++;  @endphp 
                           <div class="form-group" id="edit_thk_price_{{$product_material_thickness_data->product_material_thickness_id}}">              
                             {{Form::label('','',['class' => 'col-md-2 control-label','for'=>'example-text-input'])}}             
                              <div class="col-lg-6" >
                                {{ Form::hidden('product_material_thickness_id[]', isset($product_material_thickness_data) ? $product_material_thickness_data->product_material_thickness_id : '') }}
                                    <div class="row">
                                        <div class="col-sm-3">
                                        {{Form::text('thickness_form[]',isset($product_material_thickness_data) ? $product_material_thickness_data->thickness_form : '',['class' => 'form-control','required'=>'required','id'=>'form_1'])}}    
                                        </div>

                                        <div class="col-lg-3">
                                        {{Form::text('thickness_to[]',old('thickness_to[]', isset($product_material_thickness_data) ? $product_material_thickness_data->thickness_to : ''),['class' => 'form-control','required'=>'required','id'=>'to_1'])}}
                                            
                                        </div>
                                        <div class="col-lg-3">
                                        {{Form::text('thickness_price[]',old('thickness_price[]', isset($product_material_thickness_data) ? $product_material_thickness_data->thickness_price : ''),['class' => 'form-control','required'=>'required','id'=>'price_1'])}}
                                        </div>

                                        <div class="col-lg-3">
                                             <!-- <button id="btnAdd1" type="button" value="+" class="btn btn-circle btn-primary add_more_button"/><i class="fa fa-plus" aria-hidden="true"></i></button> -->

                                              <button type="button"  value="{{$product_material_thickness_data->product_material_thickness_id}}"  id="edit_thk_price" class="btn btn-circle btn-danger add_more_button" title="Add Profit"><i class="fa fa-minus" aria-hidden="true"></i></button>

                                                                               
                                        </div>
                                       
                                        
                                    </div>
                              </div>
                            </div>  



                                    @endforeach

                            @endif
                            
                       
                        <div id="add_thickness_price">

                        </div>  






                    <div id="printing_Effect">
                      <div class="form-group{{ $errors->has('product_layer_id') ? ' has-error' : '' }}">
                        {{Form::label('printing_effect','Printing Effect',['class' => 'col-md-2 control-label'])}}
                        <div class="col-md-3">
                             <div class="panel panel-default">                                     
                                <div class="panel-body">
                                     <div class="i-checkss">
                                            @foreach ($printing_Effect as $printing_Effect) 

                                            @if(isset($product_material_data))
                                                @php $key=explode(',',$product_material_data->printing_effect) @endphp

                                                 @if(in_array($printing_Effect->printing_effect_id ,$key))
                                                    {{ Form::checkbox('printing_effect[]', $printing_Effect->printing_effect_id,true,['class'=>'sub_chk']) }}
                                                 @else
                                                  {{ Form::checkbox('printing_effect[]', $printing_Effect->printing_effect_id,false,['class'=>'']) }}
                                                @endif
                                                @else
                                                    {{ Form::checkbox('printing_effect[]', $printing_Effect->printing_effect_id,null,['class'=>'']) }}
                                                 @endif
                                                      &emsp;{{ Form::label('effects', $printing_Effect->effect_name) }}<br><br>
                                            @endforeach



                                        @if ($errors->has('printing_effect'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('printing_effect') }}</strong>
                                            </span>
                                        @endif
                                          
                                    </div>
                               </div> 
                            </div>
                        </div>    
                      </div> 
                    </div>     


                     <div class="form-group{{ $errors->has('product_layer_id') ? ' has-error' : '' }}">
                        {{Form::label('make_pouch', trans('dashboard.make_pouch'),['class' => 'col-md-2 control-label'])}}
                        <div class="col-md-3">
                        <div class="panel panel-default">                                     
                        <div class="panel-body">
                         <div class="i-checkss">
                               @foreach ($product_make as $product_make) 

                                @if(isset($product_material_data))
                                    @php $key=explode(',',$product_material_data->make_pouch) @endphp

                                     @if(in_array($product_make->make_id ,$key))
                                        {{ Form::checkbox('make_pouch[]', $product_make->make_id,true,['class'=>'sub_chk']) }}
                                     @else
                                      {{ Form::checkbox('make_pouch[]', $product_make->make_id,false,['class'=>'']) }}
                                    @endif
                                    @else
                                        {{ Form::checkbox('make_pouch[]', $product_make->make_id,null,['class'=>'']) }}
                                     @endif
                                          &emsp;{{ Form::label('make_pouch', $product_make->make_name) }}<br><br>
                                @endforeach



                            @if ($errors->has('make_pouch'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('make_pouch') }}</strong>
                                </span>
                            @endif

                        </div>
                     </div>
    
                        </div>
                        </div>    
                    </div>    




                     <div class="form-group{{ $errors->has('product_layer_id') ? ' has-error' : '' }}">
                       {{Form::label('squan', trans('dashboard.squan'),['class' => 'col-md-2 control-label'])}}
                        <div class="col-md-3">
                        <div class="panel panel-default">                                     
                        <div class="panel-body">
                         <div class="i-checks">
                              
                               @foreach ($product_quantity as $product_quantity) 
                                    @if(isset($product_material_data))
                                        @php $key=explode(',',$product_material_data->quantity) @endphp

                                     @if(in_array($product_quantity->product_quantity_id ,$key))  
                                        {{ Form::checkbox('quantity[]', $product_quantity->product_quantity_id,true,['class'=>'sub_chk']) }}
                                     @else
                                      {{ Form::checkbox('quantity[]', $product_quantity->product_quantity_id,false,['class'=>'sub_chk']) }}
                                     @endif
                                     @else
                                        {{ Form::checkbox('quantity[]', $product_quantity->product_quantity_id,null,['class'=>'sub_chk']) }}
                                     @endif                
                                        &emsp;{{ Form::label('quantity', $product_quantity->quantity) }}<br><br>
                                @endforeach



                            @if ($errors->has('quantity'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                            @endif


                        </div> <input type="button" style="font-size: 15px" class="btn btn-primary" id="checkAll"  value="SelectAll">
                     </div>
    
                        </div>
                        </div>    
                    </div>    


       
                   

                    <div class="form-group">
                            {{Form::label('mat_unit', trans('dashboard.mat_unit'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-3">
                                    {{Form::text('material_unit',old('material_unit', isset($product_material_data) ? $product_material_data->material_unit : ''),['class' => 'form-control','required'=>'required'])}}

                                    @if ($errors->has('material_unit'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('material_unit') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {{Form::label('status', trans('dashboard.status'),['class' => 'col-md-2 control-label'])}}
                            <div class="col-lg-2" >                                                  
                                {!!form::select('status',['1'=>'Active','0'=>'Inactive'],isset($product_material->product_material_id) ? $product_material->status: "",['class'=>'form-control m-b'])!!}

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                @endif

                            </div>
                    </div>        

                    <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">

                            @if(!empty($product_material))
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
    $('#checkAll').click(function(){
            
            if ($(this).val() == 'SelectAll') {

              $('.icheckbox_square-green').addClass('checked');
              $('.sub_chk').prop('checked', true);
                $(this).val('UnselectAll');
            } else {
                $('.icheckbox_square-green').removeClass("checked");
                $('.sub_chk').prop('checked', false);
                $(this).val('SelectAll');
            }
    });

</script>

<script>
    $(document).ready(function () {
    if($('#checkbox1').is(":checked")== 1){
          $('#printing_Effect').css("display", "inline");
    }else{
      $('#printing_Effect').css("display", "none");

    }

    
     //if($('#checkbox1').iCheck('check') == "true"){alert("1133");};
    //var checkboxes = $("#checkbox1").find(".icheck input[type=checkbox]").val();
     //alert(checkboxes);



           $('#checkbox1').on('ifChecked', function () {  $('#printing_Effect').css("display", "inline"); })

           $('#checkbox1').on('ifUnchecked', function () {  $('#printing_Effect').css("display", "none"); })



            $('.i-checkss').iCheck({
             checkboxClass: 'icheckbox_square-green2',
             radioClass: 'iradio_square-green',
             });
            $('.i-checks').iCheck({
             checkboxClass: 'icheckbox_square-green',
             radioClass: 'iradio_square-green',
             });

        

     });

     $(document).on('click',  '#remove_edit_thick', function(){
             var divID = '#' + this.value ; 
             
           $(divID).remove();
        });

         $(document).on('click',  '#edit_thk_price', function(){

              var thicknessprice_id=this.value;
               $.ajax({
                        "url": '{!! action("Admin\Product\Product_MaterialController@anyData1") !!}',
                        async: false,
                        data: {thicknessprice_id: thicknessprice_id},
                        method: 'GET',
                        success: function (data) {

                        }
                      });  


            var divID = '#edit_thk_price_' + this.value ; 
             
           $(divID).remove();
        });

   
</script> 

<script type="text/javascript">
// Thickness multiple add start
 $(document).ready(function(){      
      var i=1;  
      $('#add_thickness').append('<br>');
      $('#thik').click(function(){  
           i++;
           var html='<div class="form-group" id="thick_'+i+'"><label for="thickness" class="col-lg-2  control-label"></label>';
               html+='<div class="col-lg-3"><input type="text" name="thickness[]" placeholder="Thickness" class="form-control name_list" required="required" /></div>';
               html+='<button type="button"  value="thick_'+i+'"  id="thik_rmv" class="btn btn-circle btn-danger add_more_button" >';
               html+='<i class="fa fa-minus" aria-hidden="true"></i></button></div>';
                     
                     
           $('#add_thickness').append(html);  
      });  
});
 $(document).on('click',  '#thik_rmv', function(){
     var divID = '#' + this.value ; 
     
   $(divID).remove();
});
 //Thickness Multiple over


// THickness Price start
  $(document).ready(function(){      
      var i=1;  
      $('#add_thickness_price').append('<br>');
      $('#thicknessprice').click(function(){  
           i++;

            var html='<div class="form-group" id="thicknessprice_rmv_'+i+'"><input name="product_material_thickness_id[]" type="hidden" ><label for="" class="col-md-2 control-label"></label><div class="col-lg-6"><div class="row"><div class="col-sm-3"><input type="text" name="thickness_form[]" class="form-control" required="required"></div>';
             html+='<div class="col-lg-3"><input type="text" name="thickness_to[]" class="form-control" required="required"></div><div class="col-lg-3">';
             html+='<input type="text" name="thickness_price[]" class="form-control" required="required"></div><div class="col-lg-3">';
             html+='<button type="button"   value="thicknessprice_rmv_'+i+'" id="thicknessprice_rmv" class="btn btn-circle btn-danger add_more_button" title="Add Profit"><i class="fa fa-minus" aria-hidden="true"></i></button></div>';
             html+='</div></div></div>';
                     
           $('#add_thickness_price').append(html);  
      });  
});
 $(document).on('click',  '#thicknessprice_rmv', function(){
     var divID = '#' + this.value ; 
     
   $(divID).remove();
});

 // THickness Price Over


 
</script>



@endsection


