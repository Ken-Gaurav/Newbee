@extends('layouts.admin.default')

@section('styles')

@endsection

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h2></h2>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href=""><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ action('Admin\InternationalBranch\AdminDetails_Permission_Controller@getIndex') }}"><span class="nav-label">Users Listing</span></a>
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
                                <h2>{{$Adminid->name}}'s Employee Details</h2>

                                <div class="row"  align="right" style="margin-bottom: 10px;">
                                      <a href="{{ action('Admin\InternationalBranch\Employees_Details_Controller@CreateEmployee',[$Adminid->id]) }}"><span class="btn btn-primary btn-xs"> <i class="fa fa-plus"></i> Add Employee</span></a>
                                      <span class="btn btn-primary btn-xs active_all" data-toggle="modal" data-target="#myModal2">{{ trans('dashboard.active') }}</span>
                                      <span class="btn btn-warning btn-xs inactive_all" data-toggle="modal" data-target="#myModal2">{{ trans('dashboard.inactive') }}</span>
                                      <span class="btn btn-danger btn-xs delete_all" data-toggle="modal" data-target="#myModal2" style="margin-right: 5px;">{{ trans('dashboard.delete') }}</span>
                                </div> 
                                
                          

                            <div class="ibox-content">
                                <div class="table-responsive">

                                    <form id="frmFilter">
                                        <input type="hidden" name="hdnStatus" id="hdnStatus" value="0" />
                                     {{ Form::hidden('admin_id',isset($Adminid) ? $Adminid->id : '',['id' => 'admin_id']) }}

                                    </form>
                                     <table class="table table-striped table-hover" id="Employee_table">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select_all"></th>
                                                <th class="no-sort hidden-sm-down">Name</th>
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
//$('.chosen-select').chosen({width: "100%"});
$('#select_all').on('click',function(e){
    if($(this).is(':checked',true)) {
            $(".sub_chk").prop('checked', true);
        }
        else {
            $(".sub_chk").prop('checked',false);
        }
});
// function AddAccounts(empid){
//     var admin_id=$('#admin_id').val();
//     var AssociatedAccounts=$('#AssociatedAccounts').val();
//     var employee_id=empid;
  
//     $('.acmodals').attr('data-toggle','modal');

//       $('#save_asscoiated_users').on('click',function(e){  
         
//             var users = [];
//         $.each($(".userss option:selected"), function(){            
//             users.push($(this).val());
//         });
//         users=users.join(",");
        
//          $.ajax({

//                     "url": '/AssociatedAccounts',   
//                      type: "GET",
//                     async: false,
//                     data: {admin_id:admin_id,emp_id:employee_id,emp_ids:users,AssociatedAccounts:AssociatedAccounts},
//                     method: 'GET',
//                     success: function (data) {
//                         if (data.success == 'success') {
//                             setTimeout(function () {
//                                 showErrorMessage("Status has been changed.");
// //                                 next();
//                             }, 1000);
                            
//                             $('#Employee_table').DataTable().draw();
                             
//                         } else {
//                             setTimeout(function () {
//                                  toastr.options = {
//                                                 closeButton: true,
//                                                 progressBar: true,
//                                                 showMethod: 'slideDown',
//                                                 timeOut: 4000
//                                             };
//                                             toastr.success('Added Successfully');
//                             }, 1000);
//                             $('#Employee_table').DataTable().draw();
//                             return false;
//                         }
//                          location.reload();
//                     }
                   


//                 });
//                 location.reload();
//               });
// }
$('#modal').on('hidden', function() {
    $(this).removeData('modal');
});
//Multile Delete
$('.delete_all').on('click',function(e){
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
                        "url": '/Employeeremove/'+join_selected_values,                       
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
                                $('#Employee_table').DataTable().draw();
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

//Active Multiple
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
            if (confirm("Are you sure Status changed!")) {
                $.ajax({

                    "url": '/EmployeeActive/'+join_selected_values,   
                     type: "GET",
                    async: false,
                    data: {ids:join_selected_values},
                    method: 'GET',
                    success: function (data) {
                        if (data.success == 'success') {
                            setTimeout(function () {
                                showErrorMessage("Status has been changed.");
//                                 next();
                            }, 1000);
                            $('#Employee_table').DataTable().draw();
                        } else {
                            setTimeout(function () {
                                 toastr.options = {
                                                closeButton: true,
                                                progressBar: true,
                                                showMethod: 'slideDown',
                                                timeOut: 4000
                                            };
                                            toastr.success('Status changed');
                            }, 1000);
                            $('#Employee_table').DataTable().draw();
                            return false;
                        }
                    }

                });
            } else {
                $('#Employee_table').DataTable().draw();
                return false;
            }
        }
    });
//End

//Inactive all
$('.inactive_all').on('click', function() {

        var allVals = [];  
        $(".sub_chk:checked").each(function() {  
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)  
        {  
           // alert("Please select row.");  
        }  else {

         var join_selected_values = allVals.join(",");   

         var status = $(this).is(":checked") ? 1 : 0;   
           
            alert(join_selected_values);
            if (confirm("Are you sure Status changed!")) {
                $.ajax({
                    "url": '/EmployeeInActive/'+join_selected_values,
                    async: false,
                    data: {ids:join_selected_values},
                    method: 'GET',
                    success: function (data) {
                        if (data.success == 'success') {
                            setTimeout(function () {
                                showErrorMessage("Status has been changed.");
//                                 next();
                            }, 1000);
                            $('#Employee_table').DataTable().draw();
                        } else {
                            setTimeout(function () {
                                 toastr.options = {
                                                closeButton: true,
                                                progressBar: true,
                                                showMethod: 'slideDown',
                                                timeOut: 4000
                                            };
                                            toastr.success('Status changed');
                            }, 1000);
                            $('#Employee_table').DataTable().draw();
                            return false;
                        }
                    }

                });
            } else {
                $('#Employee_table').DataTable().draw();
                return false;
            }
        }
    });
//End
$(function() {
       var admin_id=$('#admin_id').val();
       //alert(courier_id);
        $dataTable = $('#Employee_table').DataTable({
        processing: true,
        serverSide: true,
            ajax: {
            url : '/getEmployeeData/'+admin_id,
            type:'GET',
        }, 
        aoColumns: [ 
            { data: 'employee_details_id', name: 'employee_details_id', orderable: false, searchable: false },
            { data: 'first_name', name: 'first_name' },  
            { data: 'status', name: 'status'},
            { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
                       
        
    })
});




  $(document).on('change','input.js-switch', function() {
                var product_zipper_id = $(this).attr('data-id');
                var status = $(this).is(":checked") ? 1 : 0;
                var self = this;
                if (confirm("Are you sure Status changed!")) {
                    $.ajax({
                        "url": '/EmployeeSlider',
                        async: false,
                        data: {employee_details_id: employee_details_id, status: status},
                        method: 'GET',
                        success: function (data) {
                            if (data.success == 'success') {
                                setTimeout(function () {
                                    showErrorMessage("Status has been changed.");
//                                 next();
                                }, 1000);
                                $('#Employee_table').DataTable().draw();
                            } else {
                                setTimeout(function () {
                                    showErrorMessage("There is something wrong");
//                                 next();
                                }, 1000);
                                $('#Employee_table').DataTable().draw();
                                return false;
                            }
                        }
                    });
                } else {
                    $('#Employee_table').DataTable().draw();
                    return false;
                }
            });


</script>


    @endsection