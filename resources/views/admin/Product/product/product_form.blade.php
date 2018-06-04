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
                            {{Form::label('Product_name','Product Name',['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-5">
                                    {{Form::text('product_name',old('product_name', isset($product) ? $product->product_name : ''),['class' => 'form-control','placeholder'=>'Product Name','required'=>'required'])}}

                                    @if ($errors->has('product_name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('product_name') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('abbrevation', trans('Abbrevation'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-2">
                                    {{Form::text('abbrevation',old('abbrevation', isset($product) ? $product->abbrevation : ''),['class' => 'form-control','placeholder'=>'abbrevation','required'=>'required'])}}

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
                                    {{Form::text('per_kg_price',old('per_kg_price', isset($product) ? $product->per_kg_price : ''),['class' => 'form-control','placeholder'=>'Per Kg Price','required'=>'required'])}}

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
                                    {{Form::text('strip_thickness',old('strip_thickness', isset($product) ? $product->strip_thickness : ''),['class' => 'form-control','placeholder'=>'Strip Thickness'])}}

                                    @if ($errors->has('strip_thickness'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('strip_thickness') }}</strong>
                                                    </span>
                                    @endif

                                </div>
                        </div>

                        


                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            {{Form::label('status', trans('dashboard.status'),['class' => 'col-md-4 control-label'])}}
                                <div class="col-lg-2" >                                                  
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