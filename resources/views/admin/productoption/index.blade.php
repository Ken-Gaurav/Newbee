@extends('layouts.admin.default')

@section('styles')

@endsection

@section('header')
    <div class="row">
        <div class="col-lg-12">
            <h2>{{ trans('dashboard.product_option') }}</h2>
            <ol class="breadcrumb">
                <li>
                    <a href=""><span class="nav-label">{{ trans('dashboard.dashboard') }}</span></a>
                </li>
                <li>
                    <a ><span class="nav-label">{{ trans('dashboard.product_option_list') }}</span></a>
                </li>
                <li class="active">
                   <!--  <strong>{{ isset($cmsMenu) ? trans('dashboard.edit_menu') : trans('dashboard.add_menu') }}</strong> -->
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    
        

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Product Option Listing</h5>
                            
                        </div>
                   

                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="menuTable">

                            <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>Option Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                             
                            </tr>
                            </thead>
                            <tbody>
                            
                           
                            </tbody>
                            
                            </table>
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
        $dataTable = $('#menuTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url : '{!! action('Admin\Product\ProductOptionController@getAnyData') !!}',
                type:'get',                
            },
            columns: [
                {data:'product_option_id',name:'product_option_id'},
                { data: 'option_name', name: 'option_name' },
                { data: 'price', name: 'price' },
                { data: 'status', name: 'status' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
           // aaSorting: [[3, 'desc']]
            fnDrawCallback: function( oSettings ) {
                    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

                    elems.forEach(function(html) {
                        var switchery = new Switchery(html);
                    });
                }
        });
    });


      $(document).on('change','input.js-switch', function() {
                var product_option_id = $(this).attr('data-id');
                var status = $(this).is(":checked") ? 1 : 0;
                var self = this;
                if (confirm("Are you sure Status changed!")) {
                    $.ajax({
                        "url": '{!! action('Admin\Product\ProductOptionController@anyData1') !!}',
                        async: false,
                        data: {product_option_id: product_option_id, status: status},
                        method: 'GET',
                        success: function (data) {
                            if (data.success == 'success') {
                                setTimeout(function () {
                                    showErrorMessage("Status has been changed.");
//                                 next();
                                }, 1000);
                                $('#menuTable').DataTable().draw();
                            } else {
                                setTimeout(function () {
                                    showErrorMessage("There is something wrong");
//                                 next();
                                }, 1000);
                                $('#menuTable').DataTable().draw();
                                return false;
                            }
                        }
                    });
                } else {
                    $('#menuTable').DataTable().draw();
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
                $('#menuTable').DataTable().draw();
            }
        })

    </script>
@endsection



