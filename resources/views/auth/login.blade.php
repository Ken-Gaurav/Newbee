<!DOCTYPE html>
<html lang="en" >
<head>


  <meta charset="UTF-8">
  <title>SwissPac Pvt Ltd</title>
  
   <link href="packages/erp/css/bootstrap.min.css" rel="stylesheet">
    <link href="packages/erp/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="packages/erp/css/animate.css" rel="stylesheet">
    <link href="packages/erp/css/style.css" rel="stylesheet">


</head>

<body class="gray-bg">
   

    <div class="middle-box text-center loginscreen animated fadeInDown">
       
            <div>
           @if(Session::get('success_add'))
                    <div class="alert alert-success">
                        {{Session::get('success_add')}}
                    </div>
                @endif
                @if(Session::get('failure_add'))
                    <div class="alert alert-danger">
                        {{Session::get('failure_add')}}
                    </div>
                @endif
                <h1 class="logo-name">ERP</h1>
            
            </div>
          
               
            </div>   
          
        </div>
       <div class="passwordBox animated fadeInDown">
        <div class="row">
 
            <div class="col-md-12">

              <h3 align="center">Welcome to Swiss ERP</h3>
                <div class="ibox-content">

                    <h2 class="font-bold " align="center">Sign in</h2><br><br><br>


                    <div class="row">

                        <div class="col-lg-12">
                             <form class="m-t-20" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}


                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}"> 
                           
                            <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="User Name">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                         <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="login" type="password" class="form-control" name="password" placeholder="Password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div><br><br>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        
                     </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                
            </div>
            <div class="col-md-6 text-right">
               <small>© 2017-2018</small>
            </div>
        </div>
    </div>
   

 <script src="packages/erp/js/jquery-2.1.1.js"></script>
 <script src="packages/erp/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  document.getElementById("name").focus();
})

</script>
</body>
</html>
