@extends('home.header')
@section('content')
<section class="trending pb-0">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-6 ">
            {{-- <div class="col-lg-7">
                <div class="section-title text-center text-lg-start">
                    <h4 class="mb-1 theme1">Top Pick</h4>
                    <h2 class="mb-1">Best <span class="theme">Tour Packages</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore.</p>
                </div>
            </div> --}}
            <div class="col-lg-5">

            </div>
        </div>
        <div class="trend-box">
            <div class="row item-slider">
          
                <div class="row item-slider" id="lapangan-container">
                    <!-- The lapangan items will be appended here -->
                </div>
                
            </div>
        </div>
     
    </div>
</section>
<script>
    $(document).ready(function() {
        // Function to get user's current location
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        // Function to handle the position data
        function showPosition(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;
            $.ajax({
                url: 'http://127.0.0.1:8000/api/findlapangan',
                type: 'POST',
                data: {
                    latitude: latitude,
                    longitude: longitude
                },
                success: function(response) {
                    updateUI(response.data);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Function to handle geolocation errors
        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }

        // Function to update the UI with the data from the API
        function updateUI(lapangans) {
                $('#lapangan-container').empty(); // Clear previous content

                lapangans.forEach(function(lapangan, index) {
                    let lapanganHtml = '';
                    
                    if (index === 0) {
                        lapanganHtml += '<h2 class="mb-1">Lokasi <span class="mb1">Terdekat</span></h2>';
                        lapanganHtml += '<h3 class="mb-1"><a href="/detail/' + lapangan.id + '">' + lapangan.name +'<span> ' + lapangan.distance + ' Km </span>'+'</a></h3>';
                    }
                    
                    lapanganHtml += `
                        <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                            <a href="/detail/${lapangan.id}">
                                <div class="trend-item rounded box-shadow">
                                    <div class="trend-image position-relative">
                                        ${lapangan.image ? `<img src="/images/${lapangan.image}" alt="image" class="">` : ''}
                                        <div class="color-overlay"></div>
                                    </div>
                                    <div class="trend-content p-4 pt-5 position-relative">
                                        <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                            <div class="entry-author">
                                                <i class="icon-location-pin"></i> 
                                                <span class="fw-bold">${lapangan.distance} km</span>
                                            </div>
                                        </div>
                                        <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> ${lapangan.kecamatan}</h5>
                                        <h3 class="mb-1"><a href="/detail/${lapangan.id}">${lapangan.name}</a></h3>         
                                        <p class="border-b pb-2 mb-2">${lapangan.desc}</p>
                                        <div class="entry-meta">
                                            <div class="entry-author d-flex align-items-center">
                                                <p class="mb-0"><span class="theme fw-bold fs-5">${lapangan.harga}</span> | Per Hour</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `;
                    $('#lapangan-container').append(lapanganHtml);
                });
            }

            getLocation();
        });
</script>
@endsection