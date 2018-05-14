@extends('layouts.admin.default')

@section('styles')

@endsection

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h3><i class="fa fa-list"></i>My Contacts</h3>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/dashboard"><span class="nav-label">{{ trans('dashboard.user_dashboard') }}</span></a>
                </li>
                <li>
                    <i class="fa fa-list"></i>
                    <a ><span class="nav-label">Contact List</span></a>
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
                                <h5>Contact Listing</h5>

                     

                            <div class="ibox-content">
                                <div class="table-responsive">

                                    <form id="frmFilter">
                                        <input type="hidden" name="hdnStatus" id="hdnStatus" value="0" />
                                    </form>
                                     <table class="table table-striped table-hover" id="Contacts">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select_all" ></th>
                                                <th class="no-sort hidden-sm-down">Customer Name</th>
                                                <th class="no-sort hidden-sm-down">Email</th>
                                                <th class="no-sort hidden-sm-down">Consignee</th>
                                                <th class="no-sort hidden-sm-down">Delivery Address</th>
                                               <th class="no-sort hidden-sm-down">{{ trans('dashboard.action') }}</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                            @foreach($data as $data)
                                            <tr>
 
                                             <td><input type="checkbox" class="sub_chk" value="{{$data->contact_id}}"></td>
                                             <td>{{$data->customer_name}}</td>
                                             <td><i>{{$data->customer_email}}</i><br>
                                                <i><b>Country :</b> {{$data->country_name}}</i>
                                             </td>
                                             <td><?php 
                                                echo str_replace(array("\r\n", "\r", "\n"), "<br />", $data->Consignee);
                                                ?></td>
                                             <td><?php 
                                                echo str_replace(array("\r\n", "\r", "\n"), "<br />", $data->delivery_address);
                                                ?>
                                               </td>
                                             
                                             <td><a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal5" onClick="GetContactData({{$data->contact_id}});"><i class="fa fa-eye" ></i> View</a><br><Br>
                                                <a href="{{action('Admin\CRM\Contacts_Controller@getDelete',$data->contact_id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                             </tr>   
                                          @endforeach
                                        </tbody
>

                                </button>

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
                            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                    <h4 class="modal-title">Contact Details</h4>
                                                                    
                                                                </div>
                                                                <div class="modal-body">
                                                              
                                                                    <div id="my-forms"></div>                                                                            
                                                                
                                                              </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            </div>

@endsection

@section('footer_scripts')
<script type="text/javascript">

$(function() {
            $dataTable = $('#Contacts').DataTable({
          
            pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

        
             
        });
               
    });

function GetContactData(contact_id){

    //alert(contact_id);
   $('#my-forms').empty();
    
             $.ajax({
                    "url": '{{ action("Admin\CRM\Contacts_Controller@anyContactDetails") }}',
                    async: true,
                    data: {contact_id:contact_id},
                    method: 'GET',
                    dataType: 'JSON',
                    success: function (data) {
                            console.log(data.ContactDetails.customer_name);
                           
                      
                            $('#my-forms').append(' <div class="col-sm-12">'
                                                    +'<h3><strong>'+data.ContactDetails.customer_name+'</strong></h3>'
                                                    +'<h3><strong>'+data.ContactDetails.customer_email+'</strong></h3>'
                                                    +'<p><i class="fa fa-map-marker"></i> Consignee</p>'
                                                    +'<address>'
                                                    +'<strong>'+data.ContactDetails.Consignee+'</strong><br>'
                                                    +'<abbr title="Phone">P:</abbr> '+data.ContactDetails.contact_number+' '
                                                    +'</address>'
                                                     +'</div>');
                       
                       
                    }

                });

}


</script>




@endsection