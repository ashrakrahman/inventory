<!DOCTYPE html>
<html lang="en">

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Log In</title>

        <!-- Raleway shit -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="css/nprogress.css" rel="stylesheet">
        <!-- Animate.css -->
        <link href="css/animate.min.css" rel="stylesheet">
        <!-- PNotify -->
        <link href="css/pnotify.css" rel="stylesheet">
        <link href="css/pnotify.buttons.css" rel="stylesheet">
        <link href="css/pnotify.nonblock.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="css/custom.min.css" rel="stylesheet">



    </head>

    <body class="login" style="background: #fff;">
        <div>
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        <form id= "login" action="{{ route('user.login') }}" method="post" class="login-form">
                            
                            {{ csrf_field() }}
                            <div>
                                <img src="/images/user.png" style=" width: 50%; margin-bottom: 20px;">
                            </div>
                            <div>
                                <input type="text" id="email" name="email" class="form-control" placeholder="E-mail" value = "{{old('email')}}" required=""/>
                            </div>
                            <div>
                                <input type="password" id="pass" name="password" class="form-control" placeholder="Password" value="{{old('password')}}" required="" />
                            </div>
                            @if(session()->has('message'))
                                <p class="alert alert-danger" style="padding: 0px">
                                    {{ session()->get('message') }}
                                </p>
                            @endif
                            <div>
                               <button type="submit" class="btn btn-default button--tertiary submit">Log In</button>
                            </div>
                            <p> Don't have an account ? Register <a href="/register" style="color: #0000F0"> Here </a> </p>
                            <div class="clearfix"></div>

                            <div class="separator">
                                <div>
                                    2018
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <!--login form -->
    </body>
</html>
