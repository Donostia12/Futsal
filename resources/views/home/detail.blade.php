@extends('home.header')
@section('content')
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url(images/bg/bg1.jpg);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">{{$lapangan->name}}</h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$kec->name}}</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<!-- BreadCrumb Ends --> 

<!-- top Destination starts -->
<section class="trending pt-6 pb-0 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="single-content">
                    <div id="highlight" class="mb-4">
                        <div class="single-full-title border-b mb-2 pb-2">
                            <div class="single-title">
                                <h2 class="mb-1">{{$lapangan->name}}</h2>
                                <h3 class="mb-1"> <span>{{$lapangan->harga}} </span> Per-Orangs</h3>
                                <div class="rating-main d-flex align-items-center">
                                    <p class="mb-0 me-2"><i class="icon-location-pin"></i> {{$lapangan->alamat}}</p>
                                   
                                    <span>(1,186 Reviews)</span>
                                </div>
                            </div>
                        </div>
                            
                    @if ($profile == null)
                           
                    <div class="description-images mb-4">
                        <img src="{{asset('images/Default.jpg')}}" alt="" class="w-50 rounded">
                    </div>
                    @else
                           
                    <div class="description-images mb-4">
                        <img src="{{asset('images/'.$profile['image'])}}" alt="" class="w-50 rounded">
                    </div>
                    @endif

                        <div class="description mb-2">
                            <h4>Description</h4>
                            <p>{{$lapangan->desc}}</p>
                        
                        </div>

                        <div class="description d-md-flex">
                            <div class="desc-box bg-grey p-4 rounded me-md-2 mb-2">
                                <h5 class="mb-2">Jumlah Lapangan</h5>
                                <p style="text-align: center">{{$lapangan->jml_lapangan}}</p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="description mb-2">
                        <h4 class="mb-2">Gallery</h4>
                        <div class="services-image d-md-flex">
                            @foreach ($image as $item)
                                
                            <div class="me-md-2 rounded overflow-hidden mb-2"><img src="{{ asset('images/'.$item->image) }}" alt="" class="w-100"></div>
                            @endforeach
                          
                        </div>              
                    </div>

                    <div  id="single-map" class="single-map mb-4">
                        <h4>Map</h4>
                        <div class="map rounded overflow-hidden">
                            <div style="width: 100%">
                                <div id="map" style="width: 100%; height: 800px;"></div>
                       
                            <div class="col-md-12">
                                <div class="form-btn">
                                    <a class="nir-btn" style="text-align: center" href="https://www.google.com/maps/search/?api=1&query={{$lapangan->latitude}},{{$lapangan->longitude}}">Ayo pergi sekarang</a>
                                 
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div  id="single-review" class="single-review mb-4">
                        <h4>Average Reviews</h4>
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-4 col-md-4">
                                <div class="review-box bg-title text-center py-4 p-2 rounded">
                                    <h2 class="mb-1 white"><span>2.2</span>/5</h2>
                                    <h4 class="white mb-1">"Feel so much worst than thinking"</h4>
                                    <p class="mb-0 white font-italic">From 40 Reviews</p>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8">
                                <div class="review-progress">
                                    <div class="progress-item mb-1">
                                        <p class="mb-0">Cleanliness</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item mb-1">
                                        <p class="mb-0">Facilities</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:30%">
                                                <span class="sr-only">30% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item mb-1">
                                        <p class="mb-0">Value for money</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item mb-1">
                                        <p class="mb-0">Service</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-item">
                                        <p class="mb-0">Location</p>
                                        <div class="progress rounded">
                                            <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                                                <span class="sr-only">45% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- blog review -->
                    <div  id="single-add-review" class="single-add-review">
                        <h4>Write a Review</h4>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <input type="text" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <input type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <textarea>Comment</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-btn">
                                        <a href="#" class="nir-btn">Submit Review</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- sidebar starts -->
            <div class="col-lg-2">isi Side Bar</div>
        </div>
    </div>
</section>
<!-- top Destination ends -->

<!-- Discount action starts -->
<section class="discount-action pt-0" style="background-image:url(images/section-bg1.png); background-position:center;">
    <div class="container">
        <div class="call-banner rounded pt-10 pb-14">
            <div class="call-banner-inner w-75 mx-auto text-center px-5">
                <div class="trend-content-main">
                    <div class="trend-content mb-5 pb-2 px-5">
                        <h5 class="mb-1 theme">Love Where Your're Going</h5>
                        <h2><a href="detail-fullwidth.html">Explore Your Life, <span class="theme1"> Travel Where You Want!</span></a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="video-button text-center position-relative">
                         <div class="call-button text-center">
                            <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo">
                                <i class="fa fa-play bg-blue"></i>
                            </button>
                        </div>
                        <div class="video-figure"></div>
                    </div>
                </div>
            </div>
        </div>     
    </div>    
    <div class="white-overlay"></div>
    <div class="white-overlay"></div>
    <div class="section-shape  top-inherit bottom-0" style="background-image: url(images/shape6.png);"></div>
</section>
<!-- Discount action Ends -->
<h1>test github</h1>
<!-- partner starts -->
<section class="our-partner pb-6 pt-6">
    <div class="container">
        <div class="section-title mb-6 w-75 mx-auto text-center">
            <h4 class="mb-1 theme1">Our Partners</h4>
            <h2 class="mb-1">Our Awesome <span class="theme">partners</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
        </div>
        <div class="row align-items-center partner-in partner-slider">
            <div class="col-md-3 col-sm-6">
                <div class="partner-item p-4 py-2 rounded bg-lgrey">
                    <img src="images/cl-1.png" alt="">
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="partner-item p-4 py-2 rounded bg-lgrey">
                    <img src="images/cl-5.png" alt="">
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="partner-item p-4 py-2 rounded bg-lgrey">
                    <img src="images/cl-2.png" alt="">
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="partner-item p-4 py-2 rounded bg-lgrey">
                    <img src="images/cl-3.png" alt="">
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="partner-item p-4 py-2 rounded bg-lgrey">
                    <img src="images/cl-4.png" alt="">
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="partner-item p-4 py-2 rounded bg-lgrey">
                    <img src="images/cl-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
    
</section>
<script>
     const map = L.map('map').setView([-8.675050, 115.217402], 13);
     const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    var polygon = L.polygon([
                    [-8.727992, 115.195773],
                    [-8.718151, 115.212939],
                    [-8.705425, 115.244868],
                    [-8.706443, 115.262205],    
                    [-8.696737, 115.266075],
                    [-8.678240, 115.264530], 
                    [-8.666022, 115.260582],
                    [-8.649934, 115.274393],
                    [-8.599018, 115.238001],
                    [-8.606995, 115.195944],
                    [-8.659947, 115.179636],
                    [-8.696058, 115.185910],
                ]).addTo(map);
     var latitude = {{$lapangan->latitude}};
    var longitude = {{$lapangan->longitude}};
        // Use the latitude and longitude values here
        var marker = L.marker([latitude, longitude]).addTo(map);
</script>
@endsection