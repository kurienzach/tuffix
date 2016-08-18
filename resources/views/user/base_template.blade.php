<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TUFFIX PROFESSIONAL</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/css/tuffix.min.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('/font-awesome-4.1.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    @include('user.header', array("section"=>$section))

    @include('user.product_menu', array("categories"=>$categories))

    <div class="top spacer"></div><div class="spacer"></div>

    @yield('content')
   
    <div class="bottom spacer"></div>


    <div id="contact" class= "container-fluid form-section">
        <!-- contact form -->
        <div class="container">
            <div class="col-md-6">
                <div class ="row">
                <div class="address" style="padding:25px">
                <h4>contact</h4>
                 <p>Tuffix Professional,<br>Empire Building Materials Trdg Llc<br>Dubai<br>
                    <strong>Ph : 042385676 / 042247430</strong><br>
                    <strong>Fax : 042247433</strong><br>
                    <strong>Email : info[at]tuffix.com</strong></p></div>
                </div>
            </div>

            <div class="col-md-6">
                @include('user.email_form')
            </div>
        </div>
    </div>

    <div class="spacer">
    <footer>
        <div class="container text-center">
            <p style="font-size:.9em">Copyright &copy; 2015 Tuffix,All rights Reserved</p>
        </div>
    </footer>
    </div>


    <!-- Footer 
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </footer>-->

    <!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('/js/jquery-1.11.0.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('/js/jquery.easing.min.js') }}"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/js/tuffix.min.js') }}"></script>

</body>

</html>
