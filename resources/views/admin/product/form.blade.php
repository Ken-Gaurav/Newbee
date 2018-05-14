@extends('layouts.admin.default')

@section('styles')
<link href="{{ asset('packages/erp/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
<link href="{{ asset('packages/erp/css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.js"></script>
    


    <style> 
 .note-editor {
        border: 1px solid #e7eaec;
        height: auto !important;
        min-height: 300px;
    }
    .control-label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px !important;
        font-weight: 700;
        padding: 0 15px;
    }
    .note-editable.panel-body {
        height: 234px;
    }
    /*#bottom_min_qty:focus option:first-of-type {
    display: none;
}*/


    </style>
@endsection

@section('header')

    
     <div class="row">
        <div class="col-lg-12">
            <h2>{{ trans('dashboard.product') }}</h2>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href=""><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a href="{{ action('Admin\Product\product_controller@getIndex') }}" ><span class="nav-label">{{ trans('dashboard.product_list') }}</span></a>
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
                    <h5>Product Details</h5>
                </div>
                <div class="ibox-content">
                     <div class="card-box">
                        
                           

                    <form class="form-horizontal blog-form" role="form" method="POST" action="{{action('Admin\Product\product_controller@postSave') }}" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                         {{ Form::hidden('product_id', isset($product) ? $product->product_id : '') }}
                        <div class="form-group">
                            {{Form::label('product_name', trans('Product Name'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-4">
                                    {{Form::textarea('product_name',old('product_name', isset($product) ? $product->product_name : ''),['class' => 'summernote','placeholder'=>'','required'=>'required'])}}

                                    @if ($errors->has('product_name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('product_name') }}</strong>
                                                </span>
                                    @endif

                                </div>
                        </div>
                        
                        <div class="form-group">
                            {{Form::label('', trans('Gusset Available'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-2">
                                {{ Form::radio('gusset_available', '1',isset($product) ? $product->gusset_available== 1 : '') }}{{ Form::label('', 'yes') }}<br>
                                {{ Form::radio('gusset_available','0',isset($product) ? $product->gusset_available== 0 : '')}} {{ Form::label('', 'no') }}

                                </div>
                                 {{Form::label('', trans('Zipper Available'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2">
                                {{ Form::radio('zipper_available', '1',isset($product) ? $product->zipper_available== 1 : '') }} {{ Form::label('', 'yes') }}<br>
                                {{ Form::radio('zipper_available','0',isset($product) ? $product->zipper_available== 0 : '')}}       {{ Form::label('', 'no') }}

                                </div>
                        </div>

                       

                        <div class="form-group">
                            {{Form::label('', trans('Weight Available'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-2">
                                {{ Form::radio('weight_available', '1',isset($product) ? $product->weight_available== 1 : '') }} {{ Form::label('weight_available', 'yes') }}<br>
                                {{ Form::radio('weight_available','0',isset($product) ? $product->weight_available== 0 : '')}}{{ Form::label('weight_available', 'no') }}

                                </div>
                                {{Form::label('', trans('Tin Tie Available'),['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2">
                                {{ Form::radio('tintie_available', '1',isset($product) ? $product->tintie_available== 1 : '')}} {{ Form::label('', 'yes') }}<br>
                                {{ Form::radio('tintie_available','0',isset($product) ? $product->tintie_available== 0 : '')}}{{ Form::label('', 'no') }}
                                </div>
                        </div>
                        

                        <div class="form-group">
                            {{Form::label('', trans('Select Gusset Type'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-6">


                                    @if(isset($product))
                                        @php $key=explode(',',$product->gusset) @endphp

                                        @if(in_array('Bottom Gusset',$key))
                                            {{ Form::checkbox('gusset[]', 'Bottom Gusset',true,array('id' =>'checkbox')) }}
                                        @else
                                            {{ Form::checkbox('gusset[]', 'Bottom Gusset',false) }}
                                        @endif
                                        {{ Form::label('', 'Bottom Gusset') }}<br>
                                        @if(in_array('Side Gusset',$key))
                                            {{ Form::checkbox('gusset[]', 'Side Gusset',true) }}
                                        @else
                                            {{ Form::checkbox('gusset[]', 'Side Gusset',false) }}
                                        @endif
                                        {{ Form::label('',  'Side Gusset') }}<br>
                                        @if(in_array(' No Gusset - Calculate Height',$key))
                                            {{ Form::checkbox('gusset[]', ' No Gusset - Calculate Height',true) }}
                                        @else
                                            {{ Form::checkbox('gusset[]', ' No Gusset - Calculate Height',false) }}
                                        @endif
                                        {{ Form::label('',' No Gusset - Calculate Height') }}<br>

                                        @if(in_array('No Gusset - Calculate Width',$key))
                                            {{ Form::checkbox('gusset[]', 'No Gusset - Calculate Width',true) }}
                                        @else
                                            {{ Form::checkbox('gusset[]', 'No Gusset - Calculate Width',false) }}
                                        @endif
                                    {{ Form::label('', 'No Gusset - Calculate Width') }}
                                        @else
                                        {{ Form::checkbox('gusset[]', 'Bottom Gusset',null) }}
                                        {{ Form::label('', 'Bottom Gusset') }}<br>
                                        {{ Form::checkbox('gusset[]', 'Side Gusset',null) }}
                                        {{ Form::label('',  'Side Gusset') }}<br>
                                        {{ Form::checkbox('gusset[]', ' No Gusset - Calculate Height',null) }}
                                        {{ Form::label('',' No Gusset - Calculate Height') }}<br>
                                        {{ Form::checkbox('gusset[]', 'No Gusset - Calculate Width',null) }}
                                        {{ Form::label('', 'No Gusset - Calculate Width') }}
                                        @endif

                                </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('', trans('Calculate Zipper Prices'),['class' => 'col-md-4 control-label'])}}
                            <div class="col-lg-2">
                                {{ Form::radio('calculate_zipper_with', 'Width',isset($product) ? $product->calculate_zipper_with== 'Width' : '') }} {{ Form::label('', 'With width') }}<br>
                                {{ Form::radio('calculate_zipper_with','height',isset($product) ? $product->calculate_zipper_with== 'height' : '')}}{{ Form::label('', 'With height') }}
                            </div>

                            {{Form::label('', trans('Gusset Printing'),['class' => 'col-md-2 control-label'])}}
                            <div class="col-lg-2">
                                {{ Form::radio('printing_option', '1',isset($product) ? $product->printing_option== 1 : '') }} 
                                {{ Form::label('', 'yes') }}<br>
                                {{ Form::radio('printing_option','0',isset($product) ? $product->printing_option == 0 : '')}}{{ Form::label('', 'no') }}
                            </div>
                       
                        </div>
                        
                        <div class="form-group">
                            {{Form::label('', trans('Gusset Printing Option'),['class' => 'col-md-4 control-label'])}}
                            <div class="col-lg-3">
                                 @if(isset($product))
                                
                                        @php $key=explode(',',$product->printing_option_type) @endphp

                                            @if(in_array('Bottom Printing',$key))

                                            {{ Form::checkbox('printing_option_type[]','Bottom Printing',true,['class'=>'bottom_printing'])}}
                                            @else
                                                {{ Form::checkbox('printing_option_type[]','Bottom Printing',false,['class'=>'bottom_printing']) }}
                                            @endif
                                                 {{ Form::label('','Bottom Printing') }}<br>
                                            @if(in_array('Side Gusset Printing',$key))
                                                {{ Form::checkbox('printing_option_type[]','Side Gusset Printing',true,['class'=>'side_gusset_printing']) }}
                                            @else
                                                {{ Form::checkbox('printing_option_type[]','Side Gusset Printing',false,['class'=>'side_gusset_printing']) }}
                                            @endif
                                                 {{ Form::label('','Side Gusset Printing') }}<br>
                                           @if(in_array('Bottom / Side Gusset Printing',$key))
                                                {{ Form::checkbox('printing_option_type[]','Bottom / Side Gusset Printing',true,['class'=>'bottom_gusset_printing']) }}
                                            @else
                                                {{ Form::checkbox('printing_option_type[]','Bottom / Side Gusset Printing',false,['class'=>'bottom_gusset_printing']) }}
                                            @endif
                                                {{ Form::label('','Bottom / Side Gusset Printing') }}<br>
                                            @if(in_array('No Gusset Printing',$key))
                                                 {{ Form::checkbox('printing_option_type[]','No Gusset Printing',true,['class'=>'no_gusset_printing']) }}
                                            @else
                                                 {{ Form::checkbox('printing_option_type[]','No Gusset Printing',false,['class'=>'no_gusset_printing']) }}
                                            @endif                        
                                                 {{ Form::label('','No Gusset Printing') }}
                                    @else
                                        {{ Form::checkbox('printing_option_type[]','Bottom Printing',null,['class'=>'bottom_printing'])}}
                                        {{ Form::label('','Bottom Printing') }}<br>
                                        {{ Form::checkbox('printing_option_type[]','Side Gusset Printing',null,['class'=>'side_gusset_printing'])}}
                                        {{ Form::label('', 'Side Gusset Printing') }}<br>
                                        {{ Form::checkbox('printing_option_type[]','Bottom / Side Gusset Printing',null,['class'=>'bottom_gusset_printing'])}}
                                        {{ Form::label('','Bottom / Side Gusset Printing') }}<br>
                                        {{ Form::checkbox('printing_option_type[]','No Gusset Printing',null,['class'=>'no_gusset_printing'])}}
                                        {{ Form::label('','No Gusset Printing') }}

                                @endif
                            </div>

                            
                            <div class="col-lg-2" id="chk">

                              {!!form::select('bottom_min_qty',$product_qty,isset($product) ? $product->bottom_min_qty: '',array('placeholder'=>'select minimum quantity','id' =>'bottom_min_qty', 'class' => 'col-4 control-label'))!!}<br>

                              {{ Form::select('side_min_qty',$product_qty,isset($product) ? $product->side_min_qty: '', array('placeholder'=>'select minimum quantity','id' => 'side_min_qty', 'class' => 'col-4 control-label'))}}<br>

                               {{ Form::select('both_min_qty',$product_qty, isset($product) ? $product->both_min_qty: '',array('placeholder'=>'select minimum quantity','id' => 'both_min_qty', 'class' => 'col-4 control-label'))}}<br>
                               
                               {{ Form::select('no_min_qty', $product_qty, isset($product) ? $product->no_min_qty: '', array('placeholder'=>'select minimum quantity','id' => 'no_gusset_min_qty', 'class' => 'col-4 control-label'))}}
                               
                               
                            </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('', trans('Spout Pouch Available?'),['class' => 'col-md-4 control-label'])}}
                            <div class="col-lg-6">
                                {{ Form::radio('spout_pouch_available','1',isset($product) ? $product->spout_pouch_available== 1 : '') }} {{ Form::label('', 'yes') }}<br>
                                {{ Form::radio('spout_pouch_available','0',isset($product) ? $product->spout_pouch_available== 0 : '')}}
                                {{ Form::label('', 'no') }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('abbrevation', trans('Abbrevation'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-2">
                                    {{Form::text('abbrevation',old('abbrevation', isset($product) ? $product->abbrevation : ''),['class' => 'form-control','placeholder'=>'','required'=>'required'])}}

                                    @if ($errors->has('abbrevation'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('abbrevation') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>
                        
                        <div class="form-group">
                            {{Form::label(' per_kg_price', trans('Per Kg Price'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-2">
                                    {{Form::text('per_kg_price',old('per_kg_price', isset($product) ? $product->per_kg_price : ''),['class' => 'form-control','placeholder'=>'','required'=>'required'])}}

                                    @if ($errors->has('per_kg_price'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first(' per_kg_price') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>
                        
                       
                        <div class="form-group">
                            {{Form::label('strip_thickness', trans('Strip Thickness'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-2">
                                    {{Form::text('strip_thickness',old('strip_thickness', isset($product) ? $product->strip_thickness : ''),['class' => 'form-control','placeholder'=>''])}}

                                    @if ($errors->has('strip_thickness'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('strip_thickness') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('', trans('Select Make Pouch'),['class' => 'col-md-4 control-label'])}}
                            <div class="col-lg-6">
                               
                            @foreach($product_make as $product_make)

                                @if(isset($product))
                                    @php $key=explode(',',$product->make_pouch_available) @endphp

                                     @if(in_array($product_make->make_name ,$key))

                                        {{ Form::checkbox('make_pouch_available[]',$product_make->make_name,true) }}

                                    @else

                                        {{ Form::checkbox('make_pouch_available[]',$product_make->make_name,false) }}
                                     @endif

                                 @else

                                    {{ Form::checkbox('make_pouch_available[]',$product_make->make_name,null) }}
                                @endif

                                    {{ Form::label('',$product_make->make_name) }}<br>

                              
                            @endforeach  
                            
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            {{Form::label('status', trans('dashboard.status'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-6" >                                                  
                                    {!!form::select('status',['1'=>'Active','0'=>'Inactive'],isset($product->product_id) ? $product->status: "",['class'=>'form-control m-b'])!!}

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                    @endif

                                </div>
                        </div>        

                        <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">

                                @if(!empty($product))
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
     <script type="text/javascript">
         
        $(document).ready(function() {

            $('.summernote').summernote();


       });

        jQuery(document).ready(function(){
            //   $("#bottom_printing").change();
            //   hi_con();
               //alert();
                if ($('input.bottom_printing').is(':checked')) {
                 $(".bottom_printing").change();
               }
                if ($('input.side_gusset_printing').is(':checked')) {
                     $(".side_gusset_printing").change();
                }
                 if ($('input.bottom_gusset_printing').is(':checked')) {
                    $(".bottom_gusset_printing").change();
               }
               if ($('input.no_gusset_printing').is(':checked')) {
                 $(".no_gusset_printing").change();
               }
              
               
            });
         <?php if(isset($product)){}else{ ?>
           jQuery(document).ready(function(){
            $("#chk").css('display','none');
            });
          <?php } ?>

          $('.bottom_printing').change(function() {                
                    console.log('changed');                    
                     $("#chk").css('display','inline');
                     $('#bottom_min_qty').toggle();
                    });
                   $('.side_gusset_printing').change(function()  {
                       console.log('changed');
                        $("#chk").css('display','inline');
                       $('#side_min_qty').toggle();
                   });
                   $('.bottom_gusset_printing').change(function()  {
                       console.log('changed');
                        $("#chk").css('display','inline');
                       $('#both_min_qty').toggle();
                   });
                   $('.no_gusset_printing').change(function()  {
                       console.log('changed');
                        $("#chk").css('display','inline');
                       $('#no_gusset_min_qty').toggle();
                   });

               $(document).ready(function() {

                });

     </script>


     
@endsection

@section('footer_scripts')
    @endsection