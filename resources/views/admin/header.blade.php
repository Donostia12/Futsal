<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab">
	<meta name="robots" content="" >
	<meta name="keywords" content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontend">
	<meta name="description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
	<meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
	<meta property="og:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice." >
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Page Title -->
	<title>admin futsal</title>
	
	<!-- Favicon icon -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	
	<!-- All StyleSheet -->

    <link href="{{asset('assets/admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('assets/admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<!-- Globle CSS -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->


        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img src="{{ asset('assets/image/futsal.png') }}" alt="image">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Dashboard
                            </div>
						
                        </div>
                        <div class="header-right d-flex align-items-center">
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">Log-Out</button>   
                        </div>
                        
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
         <div class="dlabnav">
            <div class="dlabnav-scroll">
                <div class="dropdown header-profile2 ">
                    <a href="#"  role="button" data-bs-toggle="dropdown">
                        <div class="header-info2 d-flex align-items-center">
                            <img src="{{ asset('assets/image/profile.jpg') }}" alt="">
                            <div class="d-flex align-items-center sidebar-info">
                                <div>
                                    <span class="font-w400 d-block">{{ Auth::user()->name }}</span>
                                </div>
                               
                            </div>
                        </div>
                    </a>
                   
                </div>

				<ul class="metismenu" id="menu">
                    <li><a href="{{route('dashboard')}}" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
					<li><a  href="{{route('lapangan.index')}}" aria-expanded="false">
							<i class="flaticon-093-waving"></i>
							<span class="nav-text">Lapangan Futsal</span>
						</a>
					</li>
                    <li><a href="{{route('kecamatan.index')}}" aria-expanded="false">
						<i class="flaticon-043-menu"></i>
							<span class="nav-text">Kecamatan</span>
						</a>
                    </li>
                  <li>
                    <a href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-086-star"></i>
                        <span class="nav-text">Review</span>
                    </a>
                  </li>
                   
                </ul>
			
				
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
			
				@yield('content')
                
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		    <!-- Modal -->
            <div class="modal fade" id="basicModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Logout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">Apakah anda yakin ingin Logout?.</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
		
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p> &amp; Developed by Surya</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
	 <!-- Modal -->
	
	
	 <!-- Modal -->
	
	

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->

<script src="{{ asset('') }}assets/admin/vendor/global/global.min.js"></script>
<script src="{{ asset('') }}assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<!-- Apex Chart -->
<script src="{{ asset('') }}assets/admin/vendor/apexchart/apexchart.js"></script>
<script src="{{ asset('') }}assets/admin/vendor/chartjs/chart.bundle.min.js"></script>
<!-- Chart piety plugin files -->
<script src="{{ asset('') }}assets/admin/vendor/peity/jquery.peity.min.js"></script>
<!-- Dashboard 1 -->
<script src="{{ asset('') }}assets/admin/js/dashboard/dashboard-1.js"></script>
<script src="{{ asset('') }}assets/admin/vendor/owl-carousel/owl.carousel.js"></script>
<script src="{{ asset('') }}assets/admin/js/custom.min.js"></script>
<script src="{{ asset('') }}assets/admin/js/dlabnav-init.js"></script>
<script src="{{ asset('') }}assets/admin/vendor/global/global.min.js"></script>
<script src="{{ asset('') }}assets/admin/vendor/chartjs/chart.bundle.min.js"></script>
	<!-- Apex Chart -->
<script src="{{ asset('') }}assets/admin/vendor/apexchart/apexchart.js"></script>	
 <!-- Datatable -->
<script src="{{ asset('') }}assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}assets/admin/js/plugins-init/datatables.init.js"></script>
<script src="{{ asset('') }}assets/admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('') }}assets/admin/js/custom.min.js"></script>
<script src="{{ asset('') }}assets/admin/js/dlabnav-init.js"></script>
<script>
function JobickCarousel()
	{

		/*  testimonial one function by = owl.carousel.js */
		jQuery('.front-view-slider').owlCarousel({
			loop:false,
			margin:30,
			nav:true,
			autoplaySpeed: 3000,
			navSpeed: 3000,
			autoWidth:true,
			paginationSpeed: 3000,
			slideSpeed: 3000,
			smartSpeed: 3000,
			autoplay: false,
			animateOut: 'fadeOut',
			dots:true,
			navText: ['', ''],
			responsive:{
				0:{
					items:1,
					
					margin:10
				},
				
				480:{
					items:1
				},			
				
				767:{
					items:3
				},
				1750:{
					items:3
				}
			}
		})
	}

	jQuery(window).on('load',function(){
		setTimeout(function(){
			JobickCarousel();
		}, 1000); 
	});
</script>
</body>
</html>