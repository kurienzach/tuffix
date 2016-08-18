<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="padding: 0; margin-right: 20px;" href="#"><img style="height: 100%; width: auto;" src="{{ asset('/img/logo.png') }}"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li @if ($section==0) class="active" @endif><a href="{{ url('/admin/products') }}">Products
            @if ($section==0)  
            <span class="sr-only">(current)</span>
            @endif
        </a></li>
        <li @if ($section==1) class="active" @endif><a href="{{ url('/admin/categories') }}">Categories
            @if ($section==1)  
            <span class="sr-only">(current)</span></a></li>
            @endif
        </a></li>
        <li><a href="{{ url('/auth/logout') }}"><span style="margin-right: 7px;"class="glyphicon glyphicon-user" aria-hidden="true"></span>Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
