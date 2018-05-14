@extends('layouts.admin.default')

@section('styles')

    <style>
        
    </style>
@endsection

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h3><i class="fa fa-list"></i> Product Code</h3>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a ><span class="nav-label">Product Code List</span></a>
                </li>
                
            </ol>
        </div>
    </div>
@endsection

@section('content')
   <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
        
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                 {{ Html::image('/company_logo/Company_logo_swisspackCoInLogo.jpg', 'a picture', array('class' => 'img m-t-x img-responsive')) }}
                            </div>
                            <div class="product-desc">
                               
                                <small class="text-muted">Category</small>
                                <h3><a href="#" class="product-name"> Custome product Code</a></h3>


                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">View <i class="fa fa-long-arrow-right"></i> </a>
                                    <a href="{{action('Admin\Product\Product_Code_Controller@getCreate') }}" class="btn btn-xs btn-outline btn-primary pull-right">Add <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($product as $product)
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                 {{ Html::image('/company_logo/Company_logo_swisspackCoInLogo.jpg', 'a picture', array('class' => 'img m-t-x img-responsive')) }}
                            </div>
                            <div class="product-desc">
                               
                                <small class="text-muted">Category</small>
                                <h3><a href="#" class="product-name"> {{$product->product_name}}</a></h3>

                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">View <i class="fa fa-long-arrow-right"></i> </a>
                                    <a href="{{action('Admin\Product\Product_Code_Controller@getCreate') }}" class="btn btn-xs btn-outline btn-primary pull-right">Add <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
 

            </div>        
   </div>




        </div>
@endsection

@section('footer_scripts')


<script type="text/javascript">


   
</script>

    @endsection