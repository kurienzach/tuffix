<div class="dropdown-bar">
<div class="dropdown-holder">
<div class="container">
<div class="dropdown-bk"> 
<div class="container">
<div class="navbar-right">
    <div class="navbar-header">
        <button id="secondary-collapse" style="color:black;" type="button" class="navbar-toggle"  style="color:#fff;" data-toggle="collapse" data-parent="#secondary-collapse" data-target=".nav-pro">
            PRODUCTS <i class="fa fa-caret-down"></i>
        </button>
    </div>
    <ul class="collapse navbar-collapse nav navbar-nav nav-pro">
        @foreach($categories as $category)
            <li class="dropdown">
                <a href="@if ($section != 3) {{ url('/products#category' . $category['category']->id) }} @endif" data-toggle="dropdown" class="dropdown-toggle">
                    @if (!empty($category['category']->img_url))
                        <div class="icon"><img src="{{ asset('/img/categoryimg/' . $category['category']->img_url) }}"></div>
                    @endif
                    {{ $category['category']->name }}
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <?php $count=0; ?>
                    @foreach($category['sub_category'] as $subcategory)
                        <?php $count=$count+1; ?>
                        <li><a href="{{ url('/category/' . $subcategory->id) }}">{{ $subcategory->name }}</a></li>
                        @if ($count != sizeof($category['sub_category']))
                        <li class="divider"></li>
                        @endif
                    @endforeach
                </ul>
            </li>    
        @endforeach
    </ul>
</div>
</div>
</div>
</div>               
</div>
</div>
