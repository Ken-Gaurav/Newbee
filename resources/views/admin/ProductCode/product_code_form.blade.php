@extends('layouts.admin.default')

@section('styles')

@endsection

@section('header')

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
     <div class="row">
        <div class="col-lg-12">
            <h2>{{ trans('dashboard.spout_pouch') }}</h2>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href=""><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a href="{{ action('Admin\Product\SpoutPouch_SizeController@getIndex') }}" ><span class="nav-label">{{ trans('dashboard.spout_pouch_list') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <span class="nav-label">{{ trans('dashboard.spout_pouch_details') }}</span>
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
                    <h5>{{ trans('dashboard.spout_pouch_details') }}</h5>
                </div>
                <div class="ibox-content">
                     <div class="card-box">
                                                       

                    <form class="form-horizontal blog-form" role="form" method="POST" action="{{action('Admin\Product\SpoutPouch_SizeController@postSave') }}" enctype="multipart/form-data">
                         {!! csrf_field() !!}
                        <div ng-app="">
                        <h2 style="margin-left:150px;"><b > Product Code:</b>@{{productcode}}@{{volume}}@{{zipper}}@{{valve}}@{{pouch}}@{{color}}</h2><br>
                     <!--     <h1>Product Code Description: @{{productcode}}@{{volume}}@{{zipper}}@{{valve}}@{{pouch}}@{{color}}</h1><br><br><br>-->
                         
                            <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
                              {{Form::label('Select_Product', trans('dashboard.Select_Product'),['class' => 'col-md-2 control-label'])}}
                                 <div class="col-md-4">

                                  {!!form::select('product',$test,isset($job) ? $job->product : '',['class'=>'form-control m-b','ng-model'=>'productcode','id'=>'product_category','placeholder'=>'Select Product','id'=>'product'])!!}

                                @if ($errors->has('product'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>


                             <div class="form-group">
                            {{Form::label('valve', 'Valve',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2">
                                    <div class="i-checks">
                            {!!form::select('product',['WV'=>'With Valve','NV'=>'No Valve'],isset($job) ? $job->product : '',['class'=>'form-control m-b','ng-model'=>'valve','id'=>'product_category','placeholder'=>'Select valve','id'=>'product'])!!}
                                   

                                    </div>
                                        

                                    </div>
									
									  {{Form::label('Zipper', 'Zipper',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2">
                                    <div class="i-checks">
                            {!!form::select('product',$zip,isset($job) ? $job->product : '',['class'=>'form-control m-b','ng-model'=>'zipper','id'=>'product_category','placeholder'=>'Select Zipper','id'=>'product'])!!}
                                   

                                    </div>
                                        

                                    </div>
                                </div>
                            

                     

						<div class="form-group{{ $errors->has('job_name') ? ' has-error' : '' }}">
                        {{Form::label('Volume','Volume',['class' => 'col-md-2 control-label'])}}
							<div class="col-md-2">
								{{Form::text('volume','volume',['class' => 'form-control','placeholder'=>'Volume','required'=>'required','ng-model'=>'volume'])}}
                            @if ($errors->has('job_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('job_name') }}</strong>
                                </span>
								@endif
							</div>
						
								{{Form::label('Measurement', 'Measurement',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-2">
                                    <div class="i-checks">
									{!!form::select('Measurement',$measurement,isset($job) ? $job->product : '',['class'=>'form-control m-b','ng-model'=>'measurement','id'=>'product_category','placeholder'=>'Select Measurement','id'=>'product'])!!}
                                    </div>
								</div>
						</div>

                   
						    <div class="form-group">
								{{Form::label('Pouch color', 'Pouch color',['class' => 'col-md-2 control-label'])}}
                                <div class="col-lg-4">
                                    <div class="i-checks">
								{!!form::select('Pouch color',$Pouch_color,isset($job) ? $job->product : '',['class'=>'form-control m-b','ng-model'=>'color','id'=>'product_category','placeholder'=>'Select Product','id'=>'product'])!!}
                                    </div>
                                </div>
                            </div>



							</div><!--ng-app-->
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


@endsection

