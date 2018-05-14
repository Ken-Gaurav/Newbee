@extends('layouts.admin.default')
@section('header')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="col-lg-12">
            <h3><i class="fa fa-list"></i> {{ trans('dashboard.in_ur_det') }}</h3>    
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.in_ur') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a ><span class="nav-label">{{ trans('dashboard.in_ur_listing') }}</span></a>
                </li>
                
                
            </ol>      
     </div>
    </div>
@endsection
@section('content')
    <section class="widget">
        <div class="ibox-title">
                                <h5>{{ trans('dashboard.in_ur_det') }}</h5>
                                <div class="row"  align="right" style="margin-bottom: 10px;">
                                      <a href="{{action('Admin\Setting\Bank_Detail_Controller@getCreate')}}"><span class="btn btn-primary btn-xs"> <i class="fa fa-plus"></i> {{ trans('dashboard.in_ur_admin') }}</span></a>
                                      <span class="btn btn-primary btn-xs active_all">{{ trans('dashboard.active') }}</span>
                                      <span class="btn btn-warning btn-xs inactive_all">{{ trans('dashboard.inactive') }}</span>
                                      <span class="btn btn-danger btn-xs delete_all"  style="margin-right: 5px;">{{ trans('dashboard.delete') }}</span>
                                </div> 
        </div> 
								
       
    <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-title">
                            <button type="button" class="btn btn-outline btn-primary pull-right">Edit</button>
							<button type="button" class="btn btn-outline btn-primary pull-right">Permission</button>
							<button type="button" class="btn btn-outline btn-primary pull-right">Add Employee</button>
                            <h4>Swiss Pac Pvt. Ltd</h4>
                             Email :<h4></h4>
							 Country : <h4> India</h4>
							  Currency : <h4>INR</h4>
							   		
                        </div>
                        <div class="ibox-content">
                            <div class="team-members">
                                <a href="#"><img alt="member" class="img-circle" src="img/a1.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a2.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a3.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a5.jpg"></a>
                                <a href="#"><img alt="member" class="img-circle" src="img/a6.jpg"></a>
                            </div>
                            <h4>Info about Design Team</h4>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content
                                of a page when looking at its layout. The point of using Lorem Ipsum is that it has.
                            </p>
                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">PROJECTS</div>
                                    12
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">RANKING</div>
                                    4th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">BUDGET</div>
                                    $200,913 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>

                        </div>
                    </div>
					
                  </div>
				  
                </div>
           
    </section>
@endsection
@section('footer_scripts')
    <script src="{{ asset('packages/erp/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script type="text/javascript">

$(document).on('click','#ac', function(e) {
       
        var bank_detail_id = $(this).attr('data-id');       
        var statuschange = $(this).attr('status-id');
        var status=(statuschange==1)? 0 : 1 ;
        //alert(statuschange);
        
        var self = this;
            if (confirm("Are you sure Status changed!")) {

                $.ajax({
                    "url": '{!! action("Admin\Setting\Bank_Detail_Controller@anyStatus") !!}',
                    async: false,
                    data: {bank_detail_id: bank_detail_id, status: status},
                    method: 'GET',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {

                        if (data['success']) { 
                            setTimeout(function () {
                                                              
                                toastr["success"]("{!! trans('dashboard.user_change_status_success_msg') !!}", "{!! trans('dashboard.success') !!}");
                            }, 1000); 
                            $('#data-table').DataTable().draw();   
                        }  else {
                                setTimeout(function () {
                                    showErrorMessage("There is something wrong");
                                }, 1000);
                                $('#data-table').DataTable().draw();
                                return false;
                            }
                        }
                });
            } else {
                $('#data-table').DataTable().draw();
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
                    "url": '{!! action("Admin\Setting\Bank_Detail_Controller@getRemove")!!}',                        
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
                            $('#data-table  ').DataTable().draw();                            
                             
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
                    "url": '{{ action("Admin\Setting\Bank_Detail_Controller@anyActiveall") }}',
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
                            $('#data-table').DataTable().draw();   
                        } else {
                            setTimeout(function () {
                                alert("There is something wrong");
//                                 next();
                            }, 1000);
                            $('#data-table').DataTable().draw();
                            return false;
                        }
                    }

                });
            } else {
                $('#data-table').DataTable().draw();
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
                    "url": '{!! action("Admin\Setting\Bank_Detail_Controller@anyInactiveall") !!}',
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
                            $('#data-table').DataTable().draw();   
                        }  else {
                            setTimeout(function () {
                                alert("There is something wrong");
//                                 next();
                            }, 1000);
                            $('#data-table').DataTable().draw();
                            return false;
                        }
                    }

                });
            } else {
                $('#data-table').DataTable().draw();
                return false;
            }
        }
    });



    </script>


     <script>
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
                $('#data-table').DataTable().draw();
            }
        })

        

    </script>

@endsection