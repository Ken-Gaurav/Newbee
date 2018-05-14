<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>SwissPac Pvt Ltd</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
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
                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to Swiss ERP</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
           <form class="m-t-20" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}


                <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}"> 
                   
                    <input id="login" type="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="User Name">

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
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 © 2014</small> </p>
        </div>
    </div>



</body>
</html>
