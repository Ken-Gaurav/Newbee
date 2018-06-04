<div  class="animated fadeInDown" >
@if(isset($role_permission))


@include('layouts.admin.header')
    <div class="row wrapper border-bottom white-bg page-heading">
        @yield('header')
    </div>
    <div class="row">
        @yield('content')
    </div>
@include('layouts.admin.footer')

@else
<script>
 window.location.href = "{{URL::to('/accessdeny')}}"
</script>
@endif  
         
</div>                            

