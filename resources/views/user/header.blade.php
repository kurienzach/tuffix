<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button id="primary-collapse" type="button" class="navbar-toggle"  style="color:#fff;" data-toggle="collapse" data-parent="#secondary-collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/') }}">home</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/aboutus') }}">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/products') }}">products</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/careers') }}">Careers</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>



<!-- logo -->
<div class="container">
    <a href="{{ url('/') }}">
    <div class="logo-holder"><div class="logo"><img src="{{ asset('/img/logo.png') }}"></div></div>
    </a>
</div>

