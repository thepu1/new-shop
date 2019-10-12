<style>
    form {
        width: 0;
        margin: 0 auto;
        text-align: center;
        padding-top: 0;
    }
</style>
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-left">
                <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
            </div>
            <div class="top-right">
                <ul>
                    <li>
                        @if($cart_count && Session::get('coustomerId'))
                            <a href="{{route('checkout-shipping')}}">Check Out</a>
                    @elseif($cart_count)
                        <a href="{{route('check-out')}}">Check Out</a>
                    @endif

                    @if(Session::get('coustomerId'))
                        <li><a href="#">{{Session::get('coustomerName')}}</a></li>
                    <li><a href="{{route('check-out')}}" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">
                            <form id="logoutForm" action="{{route('coustomer-logout')}}" method="post">
                                @csrf
                            </form>

                            Logout
                        </a></li>
                    @else
                        <li><a href="{{route('coustomer-login')}}">Customer Login</a></li>
                        <li><a href="{{route('coustomer-sign-up')}}">Customer Sign-up</a></li>
                    @endif

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="heder-bottom">
        <div class="container">
            <div class="logo-nav">
                <div class="logo-nav-left">
                    <h1><a href="{{route('/')}}">New Shop <span>Shop anywhere</span></a></h1>
                </div>
                <div class="logo-nav-left1">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav">
                                @foreach($categories as $category)
                                <li class="active"><a href="{{route('category-product',$category->id)}}" class="act">{{$category->category_name}}</a></li>
                                @endforeach
                                <li><a href="{{route('mail-us')}}">Mail Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="logo-nav-right">
                    <ul class="cd-header-buttons">
                        <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                    </ul> <!-- cd-header-buttons -->
                    <div id="cd-search" class="cd-search">
                        <form action="#" method="post">
                            <input name="Search" type="search" placeholder="Search...">
                        </form>
                    </div>
                </div>
                <div class="header-right2">
                    <div class="cart box_1">
                        <a href="{{route('show-cart')}}">
                            <h3> <div class="total">
                                    <span class="cart-count" id="cart_count">{{$cart_count}} </span></div>
                                <img src="{{asset('/')}}front/assets/images/bag.png" alt="" />
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty"></a></p>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
