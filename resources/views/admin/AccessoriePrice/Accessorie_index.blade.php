@extends('layouts.admin.default')

@section('styles')

    <style>
        .control-label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px !important;
            font-weight: 700;
            padding: 0 15px;
        }
        
        #manageMenuItem .loading-screen {
            position: relative;
            padding: 10%;
        }

        /**
            * Nestable Draggable Handles
        */

        .dd3-content {
            display: block;
            height: 30px;
            margin: 5px 0;
            padding: 5px 10px 5px 40px;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background: linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .dd3-content:hover {
            color: #2ea8e5; background: #fff;
        }
        .dd-dragel > .dd3-item > .dd3-content {
            margin: 0;
        }
        .dd3-item > button {
            margin-left: 30px;
        }
        .dd3-handle {
            position: absolute;
            margin: 0;
            left: 0;
            top: 0;
            cursor: pointer;
            width: 30px;
            height: 30px;
            text-indent: 100%;
            white-space: nowrap;
            overflow: hidden;
            border: 1px solid #aaa;
            background: #ddd;
            background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:         linear-gradient(top, #ddd 0%, #bbb 100%);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .dd3-handle:before {
            content: '=';
            display: block;
            position: absolute;
            left: 0;
            top: 3px;
            width: 100%;
            text-align: center;
            text-indent: 0;
            color: #fff;
            font-size: 20px;
            font-weight: normal;
        }
        .dd3-handle:hover {
            background: #ddd;
        }
        .btn-save-main-menu {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 3px;
        }
        .menu-item-actions .actions {
            padding: 2px;
            margin: 2px;
            color: #1ab394;
        }
        .menu-item-actions .actions i {
            font-size: 20px;
            font-weight: 700;
        }
        div.dataTables_info {
        padding-top: 36px;

        }
       div.dataTables_length label {
            margin-top: 5px;
        }
        
        
    </style>
@endsection

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h3><i class="fa fa-list"></i> {{ trans('dashboard.accessorie') }}</h3>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href=""><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a ><span class="nav-label">{{ trans('dashboard.accessorie_list') }}</span></a>
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
                                <h5>{{ trans('dashboard.accessorie_listing') }}</h5>

                                <div class="row"  align="right" style="margin-bottom: 10px;">
                                      <a href="{{ action('Admin\Product\Accessorie_PriceController@getCreate') }}"><span class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Accessorie</span></a>
                                      
                                      <span class="btn btn-primary btn-xs active_all">{{ trans('dashboard.active') }}</span>
                                      <span class="btn btn-warning btn-xs inactive_all">{{ trans('dashboard.inactive') }}</span>
                                      <span class="btn btn-danger btn-xs delete_all" style="margin-right: 5px;">{{ trans('dashboard.delete') }}</span>                               
                                </div> 
                     

                            <div class="ibox-content">
                                <div class="table-responsive">

                                    <form id="frmFilter">
                                        <input type="hidden" name="hdnStatus" id="hdnStatus" value="0" />
                                    </form>
                                     <table class="table table-striped table-hover" id="accessorieTable">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select_all" ></th>
                                                <th class="no-sort hidden-sm-down">{{ trans('dashboard.name') }}</th>
                                                <th class="no-sort hidden-sm-down">{{trans('dashboard.price') }}</th>
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

$('#select_all').on('click', function(e) {
        if($(this).is(':checked',true)) {
            $(".sub_chk").prop('checked', true);
        }
        else {
            $(".sub_chk").prop('checked',false);
        }
     }); 
 
//Multiple Delete
 $('.delete_all').on('click', function(e) {

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
                        "url": '{!! action("Admin\Product\Accessorie_PriceController@getRemove") !!}',                        
                        type: 'GET',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,


                        success: function (data) {
                           
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                    });  
                                    setTimeout(function () {
                                    showErrorMessage("data has been deleted.");
//                                 next();
                                }, 1000); 
                                $('#accessorieTable').DataTable().draw();
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
 //End

//Active Multiple
 $('.active_all').on('click', function(e) {

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

        if (confirm("Are you sure Status changed!")) {
                    $.ajax({
                        "url": '{!! action("Admin\Product\Accessorie_PriceController@anyActiveall") !!}',
                        async: false,
                        data: {ids:join_selected_values,status:status},
                        method: 'GET',
                        success: function (data) {
                            if (data.success == 'success') {
                                setTimeout(function () {
                                    showErrorMessage("Status has been changed.");
//                                 next();
                                }, 1000);
                                $('#accessorieTable').DataTable().draw();
                            } else {
                                setTimeout(function () {
                                    showErrorMessage("There is something wrong");
//                                 next();
                                }, 1000);
                                $('#accessorieTable').DataTable().draw();
                                return false;
                            }
                        }
                    });
                } else {
                    $('#accessorieTable').DataTable().draw();
                    return false;
                }
            }  
});   
//End

//InActive Multiple
 $('.inactive_all').on('click', function(e) {

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

        if (confirm("Are you sure Status changed!")) {
                    $.ajax({
                        "url": '{!! action("Admin\Product\Accessorie_PriceController@anyInactiveall") !!}',
                        async: false,
                        data: {ids:join_selected_values,status:status},
                        method: 'GET',
                        success: function (data) {
                            if (data.success == 'success') {
                                setTimeout(function () {
                                    showErrorMessage("Status has been changed.");
//                                 next();
                                }, 1000);
                                $('#accessorieTable').DataTable().draw();
                            } else {
                                setTimeout(function () {
                                    showErrorMessage("There is something wrong");
//                                 next();
                                }, 1000);
                                $('#accessorieTable').DataTable().draw();
                                return false;
                            }
                        }
                    });
                } else {
                    $('#accessorieTable').DataTable().draw();
                    return false;
                }
            }  
});
//End

$(function() {
            $dataTable = $('#accessorieTable').DataTable({
            processing: true,
            serverSide: true,
                ajax: {
                url : '{!! action('Admin\Product\Accessorie_PriceController@getData') !!}',
                type:'GET',
            }, 
            aoColumns: [
                { data: 'accessorie_id', name: 'accessorie_id',orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price'},
                { data: 'status', name: 'status'},
                { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                fnDrawCallback: function( oSettings ) {
                    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

                    elems.forEach(function(html) {
                        var switchery = new Switchery(html);
                    });
                }
            
            
        });
    });

            $(document).on('change','input.js-switch', function() {
                var accessorie_id = $(this).attr('data-id');
                //alert(accessorie_id);
                var status = $(this).is(":checked") ? 1 : 0;
                var self = this;
                if (confirm("Are you sure Status changed!")) {
                    $.ajax({
                        "url": '{!! action("Admin\Product\Accessorie_PriceController@anyData1") !!}',
                        async: false,
                        data: {accessorie_id: accessorie_id, status: status},
                        method: 'GET',
                        success: function (data) {
                            if (data.success == 'success') {
                                setTimeout(function () {
                                    showErrorMessage("Status has been changed.");
//                                 next();
                                }, 1000);
                                $('#accessorieTable').DataTable().draw();
                            } else {
                                setTimeout(function () {
                                    showErrorMessage("There is something wrong");
//                                 next();
                                }, 1000);
                                $('#accessorieTable').DataTable().draw();
                                return false;
                            }
                        }
                    });
                } else {
                    $('#accessorieTable').DataTable().draw();
                    return false;
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
                $('#accessorieTable').DataTable().draw();
            }
        })

</script>


@endsection