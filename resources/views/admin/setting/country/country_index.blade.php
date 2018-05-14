@extends('layouts.admin.default')

@section('styles')

    <style>
        
    </style>
@endsection

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h3><i class="fa fa-list"></i> {{ trans('dashboard.country') }}</h3>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a ><span class="nav-label">{{ trans('dashboard.country_list') }}</span></a>
                </li>
                
            </ol>
        </div>
    </div>
@endsection

@section('content')
   <div class="row">
       
        <div class="col-lg-12">
                
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>{{ trans('dashboard.country_listing') }}</h5>

                                <div class="row"  align="right" style="margin-bottom: 10px;">
                                      <a href="{{ action('Admin\Setting\Country_Controller@getCreate') }}"><span class="btn btn-primary btn-xs"> <i class="fa fa-plus"></i> New Country</span></a>
                                      <span class="btn btn-primary btn-xs active_all">{{ trans('dashboard.active') }}</span>
                                      <span class="btn btn-warning btn-xs inactive_all" style="margin-right: 5px;">{{ trans('dashboard.inactive') }}</span>
                                      <span class="btn btn-danger btn-xs delete_all"  style="margin-right: 5px;">{{ trans('dashboard.delete') }}</span>                                      
                                </div> 
                     

                            <div class="ibox-content">
                                <div class="table-responsive">

                                    <form id="frmFilter">
                                        <input type="hidden" name="hdnStatus" id="hdnStatus" value="0" />
                                    </form>
                                     <table class="table table-striped table-hover" id="countrytable">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="chk"></th>
                                                <th class="no-sort hidden-sm-down">{{ trans('dashboard.country') }}</th>
                                                <th class="no-sort hidden-sm-down">{{ trans('dashboard.country_code') }}</th>
                                                <th class="no-sort hidden-sm-down">{{ trans('dashboard.currency') }}</th>
                                                <th class="no-sort hidden-sm-down">{{ trans('dashboard.courier') }}</th>
                                                <th class="no-sort hidden-sm-down">{{ trans('dashboard.status') }}</th> 
                                                <th class="no-sort hidden-sm-down">{{ trans('dashboard.action') }}</th>                                                
                                            </tr>
                                        </thead>
                                        
                                    </table>
                                </div>

                            </div>
                         </div>
                        </div>
                    </div>
                </div>   
            </div> 
        </div> 
    </div>
@endsection

@section('footer_scripts')


<script type="text/javascript">

$(function() {
            $dataTable = $('#countrytable').DataTable({
            processing: true,
            serverSide: true,
                ajax: {
                url : '{!! action('Admin\Setting\Country_Controller@getData') !!}',
                type:'GET',
            }, 
            aoColumns: [ 
                { data: 'country_id', name: 'country_id', orderable: false, searchable: false },
                { data: 'country_name', name: 'country_name' }, 
                { data: 'country_code', name: 'country_code' },             
                { data: 'currency_code', name: 'currency_code' }, 
                { data: 'default_courier_id', name: 'default_courier_id' },               
                { data: 'status', name: 'status'},
                { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                           
            
        })
    });

    $('#chk').on('click', function(e) 
            {
                if($(this).is(':checked',true))  
                {
                $(".sub_chk").prop('checked', true);  
                } else {  
                $(".sub_chk").prop('checked',false);  
            }  
    });

    $('.active_all').on('click', function() {

        var allVals = [];  
        $(".sub_chk:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)  
        {  
            alert("Please select row.");  
        }  else {

         var join_selected_values = allVals.join(",");   

         var status = $(this).is(":checked") ? 0 : 1;   
           
            //alert(join_selected_values);
            if (confirm("Are you sure  you want to Active Status!")) {
                $.ajax({
                    "url": '{{ action("Admin\Setting\Country_Controller@anyActiveall") }}',
                    async: false,
                    data: {ids:join_selected_values,status:status},
                    method: 'GET',
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {  
                                $(this).parents("tr").remove();
                                });  
                                setTimeout(function () {
                                 toastr["success"]("{!! trans('dashboard.user_activeall_success_msg') !!}", "{!! trans('dashboard.success') !!}");
                            }, 1000); 
                            $('#countrytable').DataTable().draw();   
                        } else {
                            setTimeout(function () {
                                alert("There is something wrong");
//                                 next();
                            }, 1000);
                            $('#countrytable').DataTable().draw();
                            return false;
                        }
                    }

                });
            } else {
                $('#countrytable').DataTable().draw();
                return false;
            }
        }
    });

    

    $('.inactive_all').on('click', function() {

        var allVals = [];  
        $(".sub_chk:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)  
        {  
            alert("Please select row.");  
        }  else {

         var join_selected_values = allVals.join(",");   

         var status = $(this).is(":checked") ? 1 : 0;   
           
            //alert(join_selected_values);
            if (confirm("Are you sure  you want to Inactive Status!")) {
                $.ajax({
                    "url": '{!! action("Admin\Setting\Country_Controller@anyInactiveall") !!}',
                    async: false,
                    type: 'GET',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {ids:join_selected_values,status:status},
                    
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {  
                                $(this).parents("tr").remove();
                                });  
                                setTimeout(function () {
                                 toastr["success"]("{!! trans('dashboard.user_inactiveall_success_msg') !!}", "{!! trans('dashboard.success') !!}");
                            }, 1000); 
                            $('#countrytable').DataTable().draw();   
                        }  else {
                            setTimeout(function () {
                                alert("There is something wrong");
//                                 next();
                            }, 1000);
                            $('#countrytable').DataTable().draw();
                            return false;
                        }
                    }

                });
            } else {
                $('#countrytable').DataTable().draw();
                return false;
            }
        }
    });

    $(document).on('click','#ac', function(e) {
       
        var country_id = $(this).attr('data-id');       
        var statuschange = $(this).attr('status-id');
        var status=(statuschange==1)? 0 : 1 ;
        //alert(statuschange);
        
        var self = this;
            if (confirm("Are you sure Status changed!")) {

                $.ajax({
                    "url": '{!! action("Admin\Setting\Country_Controller@anyStatus") !!}',
                    async: false,
                    data: {country_id: country_id, status: status},
                    method: 'GET',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {

                        if (data['success']) { 
                            setTimeout(function () {
                                                              
                                toastr["success"]("{!! trans('dashboard.user_change_status_success_msg') !!}", "{!! trans('dashboard.success') !!}");
                            }, 1000); 
                            $('#countrytable').DataTable().draw();   
                        }  else {
                                setTimeout(function () {
                                    showErrorMessage("There is something wrong");
                                }, 1000);
                                $('#countrytable').DataTable().draw();
                                return false;
                            }
                        }
                });
            } else {
                $('#countrytable').DataTable().draw();
                return false;
            }
        });

    $('.delete_all').on('click', function(e)
     {
        var allVals = [];  
        $(".sub_chk:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });  

        if(allVals.length <=0)  
        {  
            alert("Please select row.");  
        }  else {  

            var check = confirm("Are you sure you want to delete this row?");  
            if(check == true){ 

                var join_selected_values = allVals.join(","); 
              
                $.ajax({
                    "url": '{!! action("Admin\Setting\Country_Controller@getRemove")!!}',                        
                    type: 'GET',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: 'ids='+join_selected_values,

                    success: function (data) {
                       
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {  
                                $(this).parents("tr").remove();
                                });  
                                setTimeout(function () {
                                 toastr["success"]("{!! trans('dashboard.user_deleted_success_msg') !!}", "{!! trans('dashboard.success') !!}");
                            }, 1000); 
                            $('#countrytable').DataTable().draw();                            
                             
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                       // alert(data);

                    }
                });

              $.each(allVals, function( index, value ) {

                  $('table tr').filter("[data-row-id='" + value + "']").remove();
              });
            }  
        }  
    });


   
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
            $('#countrytable').DataTable().draw();
        }
    })

    </script>

    @endsection