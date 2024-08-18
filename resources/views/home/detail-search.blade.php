@extends('home.header')

<style>.popup {
    display: none; /* Sembunyikan pop-up secara default */
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5); /* Latar belakang semi-transparan */
    z-index: 1000; /* Pastikan pop-up di atas konten lain */
}

.popup-content {
    background-color: white;
    margin: 15% auto; /* Center the popup */
    padding: 20px;
    width: 80%;
    max-width: 600px;
    border-radius: 8px;
}

.popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.close-btn {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
}

.popup-body {
    margin-top: 10px;
}

.popup-footer {
    margin-top: 20px;
    text-align: right;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
}

.comment-2 {
    background: #f1f1f1;
    padding: 20px;
    border-radius: 20px;
}

.btn-secondary:hover {
    background-color: #5a6268;
}</style>
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
                                @php
                                $rating = !empty($lapangan->rated) ? $lapangan->rated : 0;
                                @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    @if($rating - $i >= 0)
                                        <i class="fas fa-star" style="margin-right: -3px; color: #f6b93b;"></i>
                                    @elseif($rating - $i < 0 && $rating - $i > -1)
                                        <i class="fas fa-star-half-alt" style="margin-right: -3px; color: #f6b93b;"></i>
                                    @else
                                        <i class="far fa-star" style="margin-right: -3px; color: #f6b93b;"></i>
                                    @endif
                                @endfor
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
                            <div class="desc-box bg-grey p-4 rounded me-md-2 mb-2">
                                <h5 class="mb-2">No Telp</h5>
                                {{-- <a href="https://wa.me/"><i>test</i></a>--}}<p style="text-align: center">{{$lapangan->telp}}</p>
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
                                <br>
                                <div class="col-md-12" style="display: flex; justify-content: flex-start;">
                                    <div class="form-btn">
                                        <a class="nir-btn" style="text-align: center; margin-left: 0;" href="https://www.google.com/maps/search/?api=1&query={{$lapangan->latitude}},{{$lapangan->longitude}}">Ayo pergi sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- review --}}
                    <div style="max-height: 300px;overflow-y: scroll;">

                        @foreach ($review as $item)
                            <div class="comment-2 mb-3">
                                <div class="comment-content rounded">
                                    <h5 class="mb-1">{{$item->name}}</h5>
                                    <div class="comment-rate">
                                        <div class="rating mar-right-15">
                                            @for ($i=1; $i<=$item->rate; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                        </div>
                                        <p class="comment">{{$item->desc}}</p>
                                    </div> 
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- review --}}
                    
                    {{-- <button id="haversine-btn" class="nir-btn">Haversine</button> --}}
                    <!-- blog review -->
                    <div  id="single-add-review" class="single-add-review">
                        <br>
                        <h4>Write a Review</h4>
                        <form action="{{route('review.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <input type="text" name="id_lap" value="{{$id}}" hidden>
                                <div class="col-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rate" id="rate" value="1">
                                        <label class="form-check-label" for="rate">1 
                                            <span class="fa fa-star checked" style="color: #F9E400"></span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rate" id="rate" value="2">
                                        <label class="form-check-label" for="rate">2 <span class="fa fa-star checked" style="color: #F9E400"></span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rate" id="rate" value="3">
                                        <label class="form-check-label" for="rate">3 <span class="fa fa-star checked" style="color: #F9E400"></span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rate" id="rate" value="4">
                                        <label class="form-check-label" for="rate">4 <span class="fa fa-star checked" style="color: #F9E400"></span></label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="rate" id="rate" value="5">
                                        <label class="form-check-label" for="rate">5 <span class="fa fa-star checked" style="color: #F9E400"></span></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-2">
                                        <textarea name="desc" class="form-control" placeholder="Comment" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-btn mb-3">
                                        <button type="submit" class="nir-btn">Buat Review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- Blog review --}}
                </div>
            </div>
            <!-- sidebar starts -->

            {{-- button modal --}}
           
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
             <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
            
            <!-- Modal HTML -->
            {{-- <div id="customPopup" class="popup">
                <div class="popup-content">
                    <div class="popup-header">
                        <h5 id="popupTitle">Hasil Perhitungan Haversine</h5>
                        <button type="button" class="close-btn" onclick="closePopup()">&times;</button>
                    </div>
                    <div class="popup-body" id="popupResults">
                        <!-- Hasil perhitungan akan ditampilkan di sini -->
                    </div>
                    <div class="popup-footer">
                        <button type="button" class="btn btn-secondary" onclick="closePopup()">Tutup</button>
                    </div>
                </div>
            </div> --}}
            
            <!-- CSS untuk Pop-Up -->
           
            
            <!-- JavaScript untuk Pop-Up Manual -->
            {{-- <script>
                $(document).ready(function() {
                    console.log('Jquary');
            
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
                                        currentLat: {{$latitude}},
                                        currentLng: {{$longitude}},
                                        destinationLat: destinationLat,
                                        destinationLng: destinationLng
                                    }),
                                    contentType: 'application/json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(response) {
                                        // Format dan tampilkan hasil dalam pop-up
                                        const resultHtml = `
                                            <p><strong>Delta Latitude:</strong> ${response.formula0}</p>
                                            <p><strong>Delta Latitude:</strong> ${response.formula01}</p>
                                            <p><strong>Delta Latitude:</strong> ${response.formula1}</p>
                                            <p><strong>Delta Longitude:</strong> ${response.formula2}</p>
                                            <p><strong>Formula a:</strong> ${response.formula3}</p>
                                            <p><strong>Formula c:</strong> ${response.formula4}</p>
                                            <p><strong>Formula distance:</strong> ${response.formula5}</p>
                                            <p><strong>Distance:</strong> ${response.distance} km</p>
                                        `;
                                        $('#popupResults').html(resultHtml);
                                        $('#customPopup').fadeIn(); // Tampilkan pop-up
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
            
                // Fungsi untuk menutup pop-up
                function closePopup() {
                    console.log('modal nutup');
                    $('#customPopup').fadeOut(); // Sembunyikan pop-up
                }
            </script> --}}
            
            {{-- </script> --}}
            
        
            <div class="col-lg-4">  
                <br>
                <br>
                <h1>jadwal Operasional</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Hari</th>
                            <th>Buka</th>
                            <th>Tutup</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Senin</td>
                            <td>{{$jadwal->senin_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->senin_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Selasa</td>
                            <td>{{$jadwal->selasa_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->selasa_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Rabu</td>
                            <td>{{$jadwal->rabu_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->rabu_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Kamis</td>
                            <td>{{$jadwal->kamis_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->kamis_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Jumat</td>
                            <td>{{$jadwal->jumat_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->jumat_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Sabtu</td>
                            <td>{{$jadwal->sabtu_buka?? 'data tidak tersedia'}}</td>
                            <td>{{$jadwal->sabtu_tutup?? 'data tidak tersedia'}}</td>
                        </tr>
                        <tr>
                            <td>Minggu</td>
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
{{-- <script>

    let latLng1;

    // Mendapatkan lokasi saat ini menggunakan geolocation API
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            // Mendapatkan koordinat latitude dan longitude
            // const latitude = position.coords.latitude;
            // const longitude = position.coords.longitude;
            const latitude = {{$latitude}};
            const longitude = {{$longitude}};
            // Membuat objek latLng1 dengan koordinat saat ini
            latLng1 = L.latLng(latitude, longitude);

            // Melanjutkan dengan inisialisasi peta dan penggunaan koordinat
            initializeMap(latLng1);
        }, function(error) {
            console.log('Gagal mendapatkan lokasi saat ini:', error);
            // Melanjutkan dengan inisialisasi peta menggunakan koordinat default atau yang lainnya
            initializeMap(latLng1);
        });
    } else {
        console.log('Geolocation tidak didukung oleh browser.');
        // Melanjutkan dengan inisialisasi peta menggunakan koordinat default atau yang lainnya
        initializeMap(latLng1);
    }

    function initializeMap(latLng1) {
        const latitude = {{ $lapangan->latitude }};
        const longitude = {{ $lapangan->longitude }};
        let map = L.map('map').setView([-8.8295929, 115.1567985], 13);
        let latLng2 = L.latLng(latitude, longitude);
        let wp1 = new L.Routing.Waypoint(latLng1);
        let wp2 = new L.Routing.Waypoint(latLng2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.Routing.control({
            waypoints: [latLng1, latLng2]
        }).addTo(map);

        let routeUs = L.Routing.osrmv1();
        routeUs.route([wp1, wp2], (err, routes) => {
            if (!err) {
                let best = 100000000000000;
                let bestRoute = 0;
                for (i in routes) {
                    if (routes[i].summary.totalDistance < best) {
                        bestRoute = i;
                        best = routes[i].summary.totalDistance;
                    }
                }
                console.log('best route', routes[bestRoute]);
                // L.Routing.line(routes[bestRoute],{
                //     styles : [
                //         {
                //             color : 'green',
                //             weight : '10'
                //         }
                //     ]
                // }).addTo(map);

            }
        })
    }
</script> --}}
@endsection