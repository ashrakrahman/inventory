<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <!-- <meta charset="utf-8"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Home </title>

    <!--Notification message class-->
    <script type="text/javascript">
        var createNotification = function (title, message, type){
            new PNotify({
                title: title,
                text: message,
                type: type,
                styling: 'bootstrap3'
            });
        }

    </script>
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="css/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="css/prettify.min.css" rel="stylesheet">    
    <!-- Select2 -->
    <link href="css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="css/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="css/starrr.css" rel="stylesheet">
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- PNotify -->
    <link href="css/pnotify.css" rel="stylesheet">
    <link href="css/pnotify.buttons.css" rel="stylesheet">
    <link href="css/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">

    <div class="container body">

        <div class="main_container">


            <div class="col-md-3 left_col">

                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        {{-- <a href="" class="site_title"><i class=""></i><span>Harriken</span></a> --}}
                    </div>
                    
                    <div class="clearfix"></div>
                    <br/>

                    @include('common.sidebar')

                </div>

            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">

                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">

                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="" alt="">
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">

                                    <li><a href=""> Profile</a></li>
                                    <li><a href="javascript:;">Help</a></li>
                                    <li><a href="/logout" id = "logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>

                                </ul>

                            </li>                        
                        </ul>

                    </nav>

                </div>

            </div>
            <!-- /top navigation -->