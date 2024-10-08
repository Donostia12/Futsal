@extends('home.header')
@section('content')
<section class="banner pt-10 pb-0 overflow-hidden">
    <div class="container">
        <div class="banner-in">
            <div class="row align-items-center">
                
              
                    <div class="banner-content text-lg-start text-center">
                        <h4 class="theme mb-0">Peta Sebaran Lapangan Futsal</h4>
                        <h1>Bergabunglah dan Bermain Futsal Bersama Kami!</h1>
                        <p class="mb-4">Lihat peta lokasi lapangan futsal di sekitar Anda.</p>
                    
                                <div class="map rounded overflow-hidden">
                                    <div id="map" style="width: 100%; height: 800px;"></div>
                                     
                                    </div>
                                </div>
                      
                    </div>
            </div>
        </div>
    </div>
</section>
 <!-- about-us starts -->
 <section class="about-us pb-6 pt-6" style="background-image:url(images/shape4.png); background-position:center;">
    <div class="container">

        <div class="section-title mb-6 w-50 mx-auto text-center">
            <h2 class="mb-1">Futsal <span class="theme">Lintas Kecamatan</span></h2>
            <p>Lihat List Tempat Futsal Berdasarkan kecamatanya</p>
            </p>
        </div>
        <!-- why us starts -->
        <div class="why-us">
            <div class="why-us-box">
                <div class="row">
                    @foreach ($kecamatan as $item)
                        
                 
                    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                        <div class="why-us-item text-center p-4 py-5 border rounded bg-white">
                            <div class="why-us-content">
                                <div class="why-us-icon">
                       
                                </div>
                                <h4><a href="/kecamatan/{{$item->id}}">{{$item->name}}</a></h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- why us ends -->
    </div>
    <div class="white-overlay"></div>
</section>
<section class="banner pt-10 pb-0 overflow-hidden">
    <div class="container">
        <div class="banner-in">
            <div class="row align-items-center">
                
            
                    <div class="banner-content text-lg-start text-center">
                        <h4 class="theme mb-0">Temukan Lapangan Futsal Terbaik di Sekitar Anda</h4>
                        <h1>Mulai Petualangan Futsal Anda Sekarang!</h1>
                        <p class="mb-4">Aktifkan layanan lokasi di browser Anda untuk pengalaman terbaik.</p>
                        <div class="book-form">
                            <div class="row d-flex align-items-center justify-content-between">
                                <div class="col-lg-12">
                                    <div class="form-group mb-0 text-center"><a href="{{route('location')}}">
                                        <button class="nir-btn w-100"> <i class="fa fa-search mr-2"></i> Find Near Me
                                        </button></a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="margin-top:100px;"></div>

                    
                        <div class="row" id="show"></div>
           
                  

            </div>
           
        </div>
    </div>
</section>

<!DOCTYPE html>
<html>
<head>
    <title>Map with Current Location Marker</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
        }
    </style>
</head>
<body>
    {{-- <div id="map"></div> --}}
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([-8.675050, 115.217402], 13);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Add polygon for Denpasar
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

        // Custom red icon
        const redIcon = L.icon({
            iconUrl:" {{asset('images/maps.svg')}} ",
            iconSize: [25, 41], // size of the icon
            iconAnchor: [12, 41], // point of the icon which will correspond to marker's location
            popupAnchor: [1, -34], // point from which the popup should open relative to the iconAnchor
            shadowSize: [41, 41] // size of the shadow
        });

        // Use the Geolocation API to get the user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                // Add a marker at the user's current location with the custom red icon
                const userMarker = L.marker([userLat, userLng], { icon: redIcon }).addTo(map)
                    .bindPopup("You are here!")
                    .openPopup();

                // Center the map on the user's location
                map.setView([userLat, userLng], 13);
            }, function(error) {
                console.error("Geolocation error: " + error.message);
            });
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    </script>
</body>
</html>

@foreach ($lapangan as $item)
    <script>
        var latitude = {{$item->latitude}};
        var longitude = {{$item->longitude}};
        var name = '{{$item->name}}';
        // Use the latitude and longitude values here
        var marker = L.marker([latitude, longitude]).addTo(map).bindPopup(name);
    </script>
@endforeach

@endsection