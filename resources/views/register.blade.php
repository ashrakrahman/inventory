<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Register </title>

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

<body class="register" style="background: #fff;">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">
                <form id= "register" action="{{ route('user.store') }}" method="post" class="register-form">
                    <p style="font-size: 25px"> Create Account </p> <br>

                    {{ csrf_field() }}
                    <div>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name"  required=""/>
                    </div>
                    <div>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username"  required=""/>
                    </div>
                    <div>
                        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required="" />
                    </div>
                    <div>
                        <input type="password" id="pass1" name="password1" class="form-control" placeholder="Password" minLength="6" required="" />
                    </div>

                    <div>
                        <input type="password" id="pass2" name="password2" class="form-control" placeholder="Confirm Password" required="" />
                    </div>
                    <div>
                        @if(session()->has('message'))
                            <p class="alert alert-dark" style="padding: 0px">
                                {{ session()->get('message') }}
                            </p>
                        @endif
                        <button type="submit" class="btn btn-default button--tertiary submit">Register</button>
                    </div>
                    <br>
                    <p> Go back to <a href="/login" style="color: #ffbd4d" style="font-weight: bold"> Log In </a> </p>
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
<!--register form -->
</body>
</html>
