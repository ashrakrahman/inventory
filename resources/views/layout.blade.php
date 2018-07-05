<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

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

    <!-- Raleway shit -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/css/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/css/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="/css/prettify.min.css" rel="stylesheet">    
    <!-- Select2 -->
    <link href="/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="/css/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="/css/starrr.css" rel="stylesheet">
    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- PNotify -->
    <link href="/css/pnotify.css" rel="stylesheet">
    <link href="/css/pnotify.buttons.css" rel="stylesheet">
    <link href="/css/pnotify.nonblock.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css" rel="stylesheet">
    <!-- Custom Harriken Style -->
    <link href="/css/custom-harriken.css" rel="stylesheet">

    <!--Javascript files-->
    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/js/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/js/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/js/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/js/moment.min.js"></script>
    <script src="/js/daterangepicker.js"></script>

    <!-- bootstrap-wysiwyg -->
    <script src="/js/bootstrap-wysiwyg.min.js"></script>
    <script src="/js/jquery.hotkeys.js"></script>
    <script src="/js/prettify.js"></script>

    <!-- jQuery Tags Input -->
    <script src="/js/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="/js/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="/js/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="/js/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="/js/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="/js/starrr.js"></script>
    <!-- jQuery autofill -->
    <script src="/js/jquery.formautofill.min.js"></script>
    <!-- PNotify -->
    <script src="/js/pnotify.js"></script>
    <script src="/js/pnotify.buttons.js"></script>
    <script src="/js/pnotify.nonblock.js"></script>

    <!-- Datatables -->
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap.min.js"></script>
    <script src="/js/dataTables.buttons.min.js"></script>
    <script src="/js/buttons.bootstrap.min.js"></script>
    <script src="/js/buttons.flash.min.js"></script>
    <script src="/js/buttons.html5.min.js"></script>
    <script src="/js/buttons.print.min.js"></script>
    <script src="/js/dataTables.fixedHeader.min.js"></script>
    <script src="/js/dataTables.keyTable.min.js"></script>
    <script src="/js/dataTables.responsive.min.js"></script>
    <script src="/js/responsive.bootstrap.js"></script>
    <script src="/js/dataTables.scroller.min.js"></script>
    <script src="/js/jszip.min.js"></script>
    <script src="/js/pdfmake.min.js"></script>
    <script src="/js/vfs_fonts.js"></script>
    <script src="/js/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/js/custom.min.js" async></script>

    <!-- Export Html table to xlxs -->
    <script src="/js/FileSaver.min.js"></script>
    <script src="/js/xlsx.core.min.js"></script>
    <script src="/js/tableExport.js"></script>
    <script src="/js/tableExport.min.js"></script>

</head>

<body class="nav-md">

    <div class="container body">
        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        
                        <img src="" class="enterprise_title">

                    </div>
                    <div class="clearfix"></div>
                    <br/>
                    @include('common.sidebar')
                </div>
            </div>

            @include('partial._top-navigation')

			<!-- page content -->
            <div class="right_col" role="main">
            	@yield('content')
            </div>
            <!-- /page content -->

			<div id="wait" style="display:none;position:absolute;top:20%;left:50%;"><img src='/images/ajax-loader.gif' /></div>

		</div> <!--main_container-->
	</div><!--container body-->
    
    @yield('scripts')

</body>

</html>

