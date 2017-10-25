<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/plugins/images/favicon.png">
    <title>Admin Inventario</title>
    <!-- Bootstrap Core CSS -->
    <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="/css/colors/blue-dark.css" id="theme" rel="stylesheet">

    <link href="/colorpicker/mcColorPicker.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Preloader -->

<div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
            <div class="top-left-part"><a class="logo" href="index.html"><b><img src="/plugins/images/pixeladmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="/plugins/images/pixeladmin-text.png" alt="home" /></span></a></div>
            <ul class="nav navbar-top-links navbar-right pull-left">
                <li>
                    <a class="" href="/"> <img src="/plugins/images/users/home.png" alt="Inicio" width="36" class="img-circle"><b class="hidden-xs">Inicio</b> </a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <a class="" href="/"> <img src="/plugins/images/users/home.png" alt="Inicio" width="36" class="img-circle"><b class="hidden-xs">Inicio</b> </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>

        @include('layouts.message')
        @yield('content')

    <footer class="footer text-center"> FERRUMEN 2017 &copy; Derechos reservados</footer>
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="/js/waves.js"></script>
<!--Counter js -->
<script src="/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--Morris JavaScript -->
<script src="/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="/plugins/bower_components/morrisjs/morris.js"></script>
<!-- Custom Theme JavaScript -->
<script src="/js/custom.min.js"></script>
<script src="/js/dashboard1.js"></script>
<script src="/plugins/bower_components/toast-master/js/jquery.toast.js"></script>

<script src="/colorpicker/mcColorPicker.js" type="text/javascript"></script>

<script type="text/javascript">
    function createForm()
    {
        document.getElementById("formContainer").innerHTML =
            '<input type="text" id="cinput2" class="color" value="#00aa00" />';
        MC.ColorPicker.reload();
    }
</script>
</body>

</html>