



<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 010 010010</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@destinykenya.go.ke</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{url("facebook.com/destinyKenya")}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}" style="height: 200em">DESTINY KENYA</a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                            </button>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li class="dropdown"><a href="#">Help?<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li style="color:#f5f5f5; size: 2em; text-align: center"><i class="fa fa-phone-square"> Contact Us</i><br />
                                        0797938403
                                    </li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">How to order</a></li>
                                    <li><a href="#">Payment Policy</a></li>
                                    <li><a href="#">Shipping Policy</a></li>
                                    <li><a href="#">Return and Refund Policy</a></li>
                                </ul>
                            </li>
                            @if(Auth::check())
                                <li class="dropdown"><a href="#"><i class="fa fa-user"></i>  {{auth()->user()->name}} <i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{url('/myaccount')}}">My Account</a></li>
                                        <li><a href="#">My Orders</a></li>
                                        <li><a href="#">My Saved Items</a></li>

                                            <hr style="width: 80%; position: center;">

                                        <li><a href="{{ url('/logout') }}"><button type="button" style="width: 80%; position: center" class="btn btn-default"><i class="fa fa-lock"></i> Logout</button> </a></li>
                                    </ul>
                                </li>


                            @else
                                <li  class="dropdown"><a href="#"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="sub-menu" role="menu">
                                    <li><a href="{{url('/login_page')}}"><button style="width: 80%; position: center" type="submit" class="btn btn-default"><i class="fa fa-lock"></i> LogIn</button></a></li>
                                    <li><p>New Customer <a href="{{url('/signup')}}">sign up</a></p></li>
                                </ul>
                                </li>
                            @endif
                            <li><a href="{{url('/viewcart')}}"><i class="fa fa-shopping-cart"></i> Cart <span>{{$count}}</span></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/">Products</a></li>
                                    <li><a href="{{url('/myaccount')}}">Account</a></li>
                                    <li><a href="{{url('/viewcart')}}">Cart</a></li>
                                </ul>
                            </li>
                            <li><a href="#" target="_blank">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
