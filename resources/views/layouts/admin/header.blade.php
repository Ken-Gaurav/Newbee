
  
<!DOCTYPE html>

<html lang="{{Lang::getLocale()}}">
<head>
      <script src="{{asset('packages/erp/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('packages/erp/js/bootstrap.min.js')}}"></script>

    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @section('title')
        Swiss Laravel
        @show
    </title>

<link rel="shortcut icon" href="packages/erp/images/laravel_logo.png">


<!-- Active Inactive -->
<link href="{{asset('packages/erp/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
<script src="{{asset('packages/erp/js/bootstrap-toggle.min.js')}}"></script>
<!-- END active inactive -->
<script src="{{ asset('packages/erp/js/plugins/dataTables/datatables.min.js') }}"></script>
    <link href="{{asset('packages/erp/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('packages/erp/css/bootstrap.combined.min.css')}}" rel="stylesheet"> -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">

  
    <script src="{{asset('packages/erp/js/plugins/pdfjs/pdf.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/jsTree/jstree.min.js')}}"></script>


    <script src="{{asset('packages/erp/js/plugins/dataTables/dataTables.min.js')}}"></script>

    <script src="{{asset('packages/erp/js/inspinia.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/peity/jquery.peity.min.js')}}"></script>



   
    <script src="{{asset('packages/erp/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/nestable/jquery.nestable.js')}}"></script>


    <link href="{{ asset('packages/erp/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('packages/erp/css/plugins/jsTree/style.min.css') }}" rel="stylesheet">
   
  


   
   
    <link href="{{ asset('packages/erp/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
    
     <script src="{{asset('packages/erp/js/plugins/chosen/chosen.jquery.js')}}"></script>

    <link href="{{ asset('packages/erp/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('packages/erp/css/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('packages/erp/css/plugins/dataTables/dataTables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('packages/erp/css/plugins/dataTables/dataTables.tableTools.min.css') }}" rel="stylesheet">
    <link href="{{ asset('packages/erp/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('packages/erp/css/app.v2.css') }}" rel="stylesheet">
    <link href="{{ asset('packages/erp/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('packages/erp/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">


    <link href="{{ asset('packages/erp/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('packages/erp/css/plugins/summernote/summernote.css') }}" rel="stylesheet">

    <link href="{{ asset('packages/erp/css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">





    <link href="{{asset('packages/erp/css/plugins/iCheck/custom.css')}}" rel="stylesheet">

    <link href="{{asset('packages/erp/css/plugins/chosen/chosen.css')}}" rel="stylesheet">

    <link href="{{asset('packages/erp/css/plugins/switchery/switchery.css')}}" rel="stylesheet">

    <script src="{{asset('packages/erp/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/iCheck/iCheck.min.js')}}"></script>

    <script src="{{asset('packages/erp/js/plugins/switchery/switchery.js')}}"></script>

    <script src="{{asset('packages/erp/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>

    <script src="{{asset('packages/erp/js/application.js')}}"></script>
    
  

    <script src="{{asset('packages/erp/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('packages/erp/js/demo/peity-demo.js')}}"></script>
    <link href="{{asset('packages/erp/css/plugins/blueimp/css/blueimp-gallery.min.css')}}" rel="stylesheet">
    
    <script src="{{asset('packages/erp/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/summernote/summernote.min.js')}}"></script>

  
    <link href="{{asset('packages/erp/css/plugins/dropzone/basic.css')}}" rel="stylesheet">
    <link href="{{asset('packages/erp/css/plugins/dropzone/dropzone.css')}}" rel="stylesheet">
    <script src="{{asset('packages/erp/js/plugins/dropzone/dropzone.js')}}"></script>



    <script src="{{asset('packages/erp/js/plugins/flot/jquery.flot.js')}}"></script>
    
    <script src="{{asset('packages/erp/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/flot/jquery.flot.pie.js')}}"></script>
   
    <script src="{{asset('packages/erp/js/plugins/gritter/jquery.gritter.min.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/nestable/jquery.nestable.js')}}"></script>

    <script src="{{asset('packages/erp/js/plugins/summernote/summernote.js')}}"></script>
    

    <script src="{{asset('packages/erp/js/plugins/typehead/bootstrap3-typeahead.min.js')}}"></script>
    
    
    <link href="{{asset('packages/erp/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    
    <!-- datepicker -->
    <link href="{{asset('packages/erp/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
    <script src="{{asset('packages/erp/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('packages/erp/js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>

    


<script>
    $(document).ready(function () {
    $('.i-checks').iCheck({
    checkboxClass: 'icheckbox_square-green',
    radioClass: 'iradio_square-green',
    
    });

     $('#data_1 .input-group.date').datepicker({
                format: 'yyyy-mm-dd',
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

   
    });
   
</script>
    @yield('styles')

    <script>
        var csrfToken = '{!! csrf_token() !!}';
    </script>
    @yield('header_scripts')
</head>


<body class="md-skin">

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
    
    <div class="sidebar-collapse">

                <ul class="navbar-default">
                <li class="nav-header">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><h2 align="center" style="color:white;">ERP</h2></strong>
                             </span> <span align="center" class="text-muted text-xs block">Welcome {{strtoupper($role_permission->name)}}</span> </span>
              
                <hr/>
                </li>

                <li>

 @foreach($categories as $item)

    @if($item->children->count() >= 0 )
     
        @if(in_array($item->admin_id,unserialize($role_permission->view_permission)))
    <li>
                    <a '@if(!empty($item->route))' href="{{url($item->route)}}" '@endif' ><i class="{{$item->icon}}"></i><span class="nav-label">{{ $item->title }} </span></a>
                   
    <ul class="navbar-default">
        @foreach($item->children as $submenu1)
            @if($submenu1->children->count() >=0)
                 @if(in_array($submenu1->admin_id,unserialize($role_permission->view_permission)))
                <li class=""><a '@if(!empty($submenu1->route))'  href="{{url($submenu1->route)}}" '@endif'><i class="{{$submenu1->icon}}"></i>{{ $submenu1->title }} </a>
                        
    <ul class="navbar-default">
                @foreach($submenu1->children as $submenu2)
                    @if($submenu2->children->count() >=0)
                        @if(in_array($submenu2->admin_id,unserialize($role_permission->view_permission)))
                <li><a class="active" '@if(!empty($submenu2->route))' href="{{url($submenu2->route)}}" '@endif'><i class="{{$submenu2->icon}}"></i>{{ $submenu2->title }} </a>
                
                <ul class="navbar-default">
                @foreach($submenu2->children as $submenu3)
                    @if(in_array($submenu3->admin_id,unserialize($role_permission->view_permission)))
                   <li><a class="menu active" '@if(!empty($submenu3->route))'  href="{{url($submenu3->route)}}" '@endif'><i class="{{$submenu3->icon}}"></i>{{$submenu3->title}}</a></li>
                   @endif
                @endforeach
                </ul>
            @endif
            @endif
                </li>
                  
        @endforeach
        </ul>
    </li>
                
    @endif
@endif
    @endforeach
    </ul>
       
        </li>
          


@endif
@endif
            
@endforeach
</li>
       </ul>      

    
</div>

</nav>
     

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#" style="background:#2f4050"><i class="fa fa-bars" ></i> </a>
                    <form role="search" class="navbar-form-custom" action="">
                        <div class="form-group">
                            {{--<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">--}}
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to ERP</span>
                    </li>
          
                 <li class="dropdown ">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown"  aria-expanded="true">
                        <i class="fa fa-gear fa-2x fa-fw"></i>  <span class="label label-primary"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        @if(Auth::User()->id==1)
                        <li>
                            <a href="/Menu">
                                <div>
                                    <i class="fa fa-gear fa-fw"></i>Menu Setting
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endif
                        <li>
                            <a >
                                <div>
                                    <i class="fa fa-user fa-fw"></i>My Profile
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @if(!empty($Multilogin))
                        <li>
                            <a >
                                <div>
                                    <i class="fa fa-user fa-fw"></i> Login As
                                </div>
                          </a>
                        </li>
                        <li class="divider"></li>
                        @foreach($Multilogin as $Multilogin)
                        <li onClick='Getdata({{$Multilogin->id}});'>
                           
                            <a >
                                <div>
                                    <i class="fa fa-list-alt fa-fw"></i> {{$Multilogin->name}}
                                 </div>
                            </a>
                        </li>
                        @endforeach
                        <li class="divider"></li>
                        @endif
                        <li>
                            <a href="{{ url('logout')}}">
                                <div>
                                    <i class="fa fa-sign-out"></i> Logout
                              </div>
                            </a>
                        </li>
                        
                        
                    </ul>
                </li>       
       

            </nav>
        </div>
       
    
<style>
.navbar-top-links .dropdown-messages, .navbar-top-links .dropdown-tasks, .navbar-top-links .dropdown-alerts {
    width: 243px;
    min-width: 0;
}
</style>
<script type="text/javascript">
function Getdata(userid){
            $.ajax({

                    "url": '/Multilogin',   
                     type: "GET",
                    async: false,
                    data: {userid:userid},
                    method: 'GET',
                    success: function (data) {
                        window.location = '/dashboard';
                        } 
                  
                });
}
</script>
