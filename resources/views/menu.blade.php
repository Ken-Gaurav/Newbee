@extends('layouts.admin.default')


@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h3><i class="fa fa-list"></i> {{ trans('dashboard.Menu') }}</h3>          
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a ><span class="nav-label">{{ trans('dashboard.Menu_List') }}</span></a>
                </li>
                
                
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <section class="widget">
        <div class="ibox-title">
                                <h5>Menu List</h5>
                                <div class="row"  align="right" style="margin-bottom: 10px;">
                                      <a href="{{ action('admin_menu_controller@getCreate') }}"><span class="btn btn-primary btn-xs"> <i class="fa fa-plus"></i> Add menu</span></a>
                                      <span class="btn btn-primary btn-xs active_all">{{ trans('dashboard.active') }}</span>
                                      <span class="btn btn-warning btn-xs inactive_all">{{ trans('dashboard.inactive') }}</span>
                                      <span class="btn btn-danger btn-xs delete_all"  style="margin-right: 5px;">{{ trans('dashboard.delete') }}</span>
                                </div> 
                                </div> 

                                <div class="ibox-content">

            
        
                        <div class="dd" id="nestable2">
                             @foreach($categories as $item)  
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">
                                             <span class="pull-right">Level 0</span>
                                            <span class="label label-info"><i class="fa fa-users"></i></span> {{ $item->title }}
                                        </div>
                                         @foreach($item->children as $submenu1)
                                        <ol class="dd-list" style="">
                                            <li class="dd-item" data-id="2">
                                                <div class="dd-handle">
                                                    <span class="pull-right"> Level 1 </span>
                                                    <span class="label label-info"><i class="fa fa-cog"></i></span> {{ $submenu1->title }}
                                                </div>
                                                 @foreach($submenu1->children as $submenu2)
                                                <ol class="dd-list" style="">
                                                    <li class="dd-item level1" data-id="2">
                                                        <div class="dd-handle">
                                                            <span class="pull-right">Level 2 </span>
                                                            <span class="label label-info"><i class="fa fa-cog"></i></span> {{ $submenu2->title }}
                                                        </div>
                                                        @foreach($submenu2->children as $submenu3)
                                                         <ol class="dd-list" style="">
                                                            <li class="dd-item level2" data-id="2">
                                                                <div class="dd-handle">
                                                                    <span class="pull-right"> Level 3</span>
                                                                    <span class="label label-info"><i class="fa fa-cog"></i></span> {{ $submenu3->title }}
                                                                </div>
                                                            </li>
                                                        </ol>
                                                         @endforeach
                                                    </li>
                                                </ol>
                                                 @endforeach
                                            </li>
                                        </ol>
                                         @endforeach
                                    </li>
                                </ol>
                            @endforeach
                        </div>
       


               




    </section>
@endsection


@section('footer_scripts')

   <script>
         $(document).ready(function(){

             var updateOutput = function (e) {
                 var list = e.length ? e : $(e.target),
                         output = list.data('output');
                 if (window.JSON) {
                     output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                 } else {
                     output.val('JSON browser support required for this demo.');
                 }
             };
             // activate Nestable for list 1
             

             // activate Nestable for list 2
             $('#nestable2').nestable({
                 group: 1
             })

             // output initial serialised data
           

            
         });
    </script>


    <script src="{{ asset('packages/erp/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script type="text/javascript">

        $(function() {
            
            $dataTable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url : '{{ action('admin_menu_controller@getData') }}',
                    type:'GET',
                },
                aoColumns: [
                    { data: 'admin_id', name: 'admin_id', orderable: false, searchable: false},
                   
                    { data: 'title', name: 'title' },
                    { data: 'parent_id', name: 'parent_id' },
                    { data: 'status', name: 'status' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                fnDrawCallback: function( oSettings ) {
                    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

                    elems.forEach(function(html) {
                        var switchery = new Switchery(html);
                    });
                }

            });
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

$(document).on('click','#ac', function(e) {
       
        var admin_id = $(this).attr('data-id');       
        var statuschange = $(this).attr('status-id');
        var status=(statuschange==1)? 0 : 1 ;
        //alert(statuschange);
        
        var self = this;
            if (confirm("Are you sure Status changed!")) {

                $.ajax({
                    "url": '{!! action("admin_menu_controller@anyStatus") !!}',
                    async: false,
                    data: {admin_id: admin_id, status: status},
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
                    "url": '{!! action("Admin\Production\product_item_info_controller@getRemove")!!}',                        
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
                            $('#data-table').DataTable().draw();                            
                             
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
                    "url": '{{ action("Admin\Production\product_item_info_controller@anyActiveall") }}',
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
                    "url": '{!! action("Admin\Production\product_item_info_controller@anyInactiveall") !!}',
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

