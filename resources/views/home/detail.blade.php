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
            <div class="col-lg-8">
                <div class="single-content">
                    <div id="highlight" class="mb-4">
                        <div class="single-full-title border-b mb-2 pb-2">
                            <div class="single-title">
                                <h2 class="mb-1">{{$lapangan->name}}</h2>
                                <h3 class="mb-1">Rp. <span>{{$lapangan->harga}} </span> /Hours</h3>
                                <div class="rating-main d-flex align-items-center">
                                    <p class="mb-0 me-2"><i class="icon-location-pin"></i> {{$lapangan->alamat}}</p>
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
                    
                    @foreach ($review as $item)
                        
                    <div  id="single-review" class="single-review mb-4">
                        <h3>{{$item->name}}</h3>
                        <h4>{{$item->desc}}</h4>
                    </div>
                    @endforeach
                    
                    {{-- <div  id="single-review" class="single-review mb-4">
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
                    </div> --}}

                    {{-- button modal haversine --}}
                    {{-- <div>
                        <button id="haversine-btn" class="nir-btn">Haversine</button>
                    </div> --}}
                    {{-- button modal haversine --}}
                    
                    <!-- blog review -->
                    <div  id="single-add-review" class="single-add-review">
                        <h4>Write a Review</h4>
                        <form action="{{route('review.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <input type="text" name="id_lap" value="{{$id}}" hidden>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <textarea name="desc" class="form-control" placeholder="Comment" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-btn">
                                        <button type="submit" class="nir-btn">Submit Review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- sidebar starts -->

            {{-- button modal --}}
           

            <!-- Modal HTML -->
            <div class="modal fade" id="haversineModal" tabindex="-1" role="dialog" aria-labelledby="haversineModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="haversineModalLabel">Hasil Perhitungan Haversine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="haversineResults">
                            <!-- Hasil perhitungan akan ditampilkan di sini -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <script>
                    $(document).ready(function() {
                $('#haversine-btn').on('click', function() {
                    // Lokasi tujuan
                    const destinationLat = {{$lapangan->latitude}};
                    const destinationLng = {{$lapangan->longitude}};
                    
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            const currentLat = position.coords.latitude;
                            const currentLng = position.coords.longitude;

                            // Kirim data ke server menggunakan AJAX
                            $.ajax({
                                    url: 'http://localhost:8000/api/haversine',
                                    type: 'POST',
                                    data: JSON.stringify({
                                        currentLat: currentLat,
                                        currentLng: currentLng,
                                        destinationLat: destinationLat,
                                        destinationLng: destinationLng
                                    }),
                                    contentType: 'application/json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(response) {
                                        // Format dan tampilkan hasil dalam modal
                                        const resultHtml = `
                                            <p><strong>Delta Latitude:</strong> ${response.formula1}</p>
                                            <p><strong>Delta Longitude:</strong> ${response.formula2}</p>
                                            <p><strong>Formula a:</strong> ${response.formula3}</p>
                                            <p><strong>Formula c:</strong> ${response.formula4}</p>
                                            <p><strong>Distance:</strong> ${response.distance} km</p>
                                        `;
                                        $('#haversineResults').html(resultHtml);
                                        $('#haversineModal').modal('show');
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('AJAX Error:', error);
                                    }
                                });

                            }, function(error) {
                                console.error('Error getting location:', error);
                            });
                        } else {
                            console.error('Geolocation is not supported by this browser.');
                        }
                    });
                });
            </script>
            {{-- </script> --}}
            
            <div class="col-lg-4">  
                <br>
                <br>
                <h1>jadwal Operasional</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Open</th>
                            <th>Close</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Monday</td>
                            <td>{{$jadwal->senin_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->senin_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td>{{$jadwal->selsa_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->selasa_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td>{{$jadwal->rabu_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->rabu_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td>{{$jadwal->kamis_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->kamis_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td>{{$jadwal->jumat_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->jumat_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td>{{$jadwal->sabtu_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->sabtu_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td>{{$jadwal->minggu_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->minggu_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- top Destination ends -->


<!-- Discount action Ends -->


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