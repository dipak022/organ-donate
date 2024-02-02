<header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-md-12 col-lg-8">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-phone"></i> (+88) 01521440888</a></li>
                                    <li><a href="#"> <i class="fa fa-envelope"></i>tonisaadhikary12@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-lg-4">
                            <div class="social_media_links d-none d-lg-block">
                                <a href="https://www.facebook.com/tonisa.adhikary">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{asset('frontend')}}/img/logo.png" alt=""  style="height:80px;width:100px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">home</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                        @auth
                                        <li><a href="{{ route('profile') }}">Profile</a></li>
                                        <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                        @else
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                        @endauth
                                    </ul>
                                </nav>
                                
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block">
                                        <a  href="{{ route('make-a-donate') }}">Make a Donate</a>
                                    </div>
                                </div>
                                <div class="Appointment">
                                    <div class="book_btn d-none d-lg-block">
                                        <a href="{{ route('death.news') }}">Death Doner Alert</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>