<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Find Futsal</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/image/futsal.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/travelin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="{{ asset('assets/travelin/css/style.css') }}" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="{{ asset('assets/travelin/css/plugin.css') }}" rel="stylesheet" type="text/css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    
</head>

<body>

    <!-- Preloader -->
    
    <!-- Preloader Ends -->

    <!-- header starts -->
    <header class="main_header_area">
      
        <!-- Navigation Bar -->
        <div class="header_menu" id="header_menu">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-flex d-flex align-items-center justify-content-between w-100 pb-3 pt-3">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{route('home')}}">
                                <img src="{{ asset('assets/image/futsal.png') }}" alt="image">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse1 d-flex align-items-center" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="dropdown submenu active">
                                    <a href="{{route('home')}}"  role="button" aria-haspopup="true" aria-expanded="false" >Home</a>
                                </li>

                                <li class="submenu dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lapangan <i class="icon-arrow-down" aria-hidden="true"></i></a> 
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('list')}}">Tentukan Lokasi Mu</a></li>
                                        <li class="submenu dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kecamatan<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            <ul class="dropdown-menu">
                                              @foreach ($kecamatan as $item)
                                                  <li><a href="/kecamatan/{{$item->id}}">{{$item->name}}</a></li>
                            
                                              @endforeach  
                                            </ul>
                                        </li>
                                    </ul> 
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->  
                        <div class="register-login d-flex align-items-center">
                            {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="me-3">
                                <i class="icon-user"></i> Login/Register
                            </a> --}}
                            <a href="{{route('location')}}" class="nir-btn white">Find Near me</a>
                        </div>

                        <div id="slicknav-mobile"></div>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!-- Navigation Bar Ends -->
    </header>
    <!-- header ends -->


    <!-- banner starts -->
  @yield('content')

    
    <!-- best tour Ends -->

   
    <!-- offer Packages Ends -->

    <!-- our teams starts -->
    
    <!-- our teams Ends -->


    <!-- footer starts -->
    <footer class="pt-20 pb-4" style="background-image: url(images/background_pattern.png);">
        <div class="section-shape top-0" style="background-image: url(images/shape8.png);"></div>
        <!-- Instagram starts -->
        
        <!-- Instagram ends -->
        {{-- <div class="footer-upper pb-4">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-4">
                        <div class="footer-links">
                            <h3 class="white">Quick link</h3>
                            <ul>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="about-us.html">Delivery Information</a></li>
                                <li><a href="about-us.html">Privacy Policy</a></li>
                                <li><a href="about-us.html">Terms &amp; Conditions</a></li>
                                <li><a href="about-us.html">Customer Service</a></li>
                                <li><a href="#about-us.html">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div> --}}


        <div class="footer-copyright">
            <div class="container">
                <div class="copyright-inner rounded p-3 d-md-flex align-items-center justify-content-between">
                    <div class="copyright-text">
                        <p class="m-0 white">2024 Skripsi PNB_Surya Riski. All rights reserved.</p>
                    </div>
                    <div class="social-links">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    </footer>
    <!-- footer ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- search popup -->
    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- login registration modal -->
    <div class="modal fade log-reg" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="post-tabs">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button aria-controls="login" aria-selected="false" class="nav-link active"
                                    data-bs-target="#login" data-bs-toggle="tab" id="login-tab" role="tab"
                                    type="button">Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button aria-controls="register" aria-selected="true" class="nav-link"
                                    data-bs-target="#register" data-bs-toggle="tab" id="register-tab" role="tab"
                                    type="button">Register</button>
                            </li>
                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content blog-full" id="postsTabContent">
                            <!-- popular posts -->
                            
                            <!-- Recent posts -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- *Scripts* -->
    {{-- <script src="{{asset("assets/travelin/js/jquery-3.5.1.min.js")}}"></script>
    <script src="{{asset("assets/travelin/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/travelin/js/particles.js")}}"></script>
    <script src="{{asset("assets/travelin/js/particlerun.js")}}"></script>
    <script src="{{asset("assets/travelin/js/plugin.js")}}"></script>
    <script src="{{asset("assets/travelin/js/custom-swiper.js")}}"></script>
    <script src="{{asset("assets/travelin/js/custom-nav.js")}}"></script> --}}
    <script src="{{asset("assets/travelin/js/main.js")}}"></script>
</body>

</html>