@extends('home.header')
@section('content')
<section class="trending pb-0">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-6 ">
            <div class="col-lg-12">
                <div class="section-title text-center text-lg-start">
                    <h2 class="mb-1">Lapangan Terdekat yang ada di kecamatan<span class="theme"><div id="terdekat"></div></span></h2>
                    <hr>
                    <p>Berikut list lapangan futsal di kecamatan </p>
                </div>
            </div>
            <div class="col-lg-5">

            </div>
        </div>
       @php
            $no =1
       @endphp
        <div class="trend-box">
            <div class="row item-slider">
                @foreach ($data as $item)
              
                @if(!empty($item)) 
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <a href="{{ route('detail', ['id'=>$item['id']]) }}">
                            <div class="trend-item rounded box-shadow">
                                <div class="trend-image position-relative">
                                    <img src="{{ asset('images/' . $item['image']) }}" alt="image">
                                    <div class="color-overlay"></div>
                                </div>
                                <div class="trend-content p-4 pt-5 position-relative">
                                    <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                        <div class="entry-author">
                                            <i class="icon-calendar"></i>
                                            <span class="fw-bold" id="{{$no}}"> km</span>
                                        </div>
                                    </div>
                                    <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> {{ $item['kecamatan'] }}</h5>
                                    <h3 class="mb-1"><a href="{{ route('detail', ['id'=>$item['id']]) }}">{{ $item['name'] }}</a></h3>
                                    <div class="rating-main d-flex align-items-center pb-2">
                                        <div class="rating">
                                            @php
                                            $rating = !empty($item['rated']) ? $item['rated'] : 0;
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
                                        </div>
                                    </div>
                                    <div class="entry-meta">
                                        <div class="entry-author d-flex align-items-center">
                                            <p class="mb-0"><span class="theme fw-bold fs-5">{{ $item['harga'] }}</span> /Jam</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                   @php
                       $no++
                   @endphp
                @endif
            @endforeach
            
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

    function getIdKecamatanFromUrl() {
        const url = window.location.href; // Mendapatkan URL saat ini
        const segments = url.split('/'); // Memisahkan URL berdasarkan '/'
        return segments[segments.length - 1]; // Mengambil segmen terakhir (id_kecamatan)
    }

    // Function to handle the position data
    function showPosition(position) {
        let latitude = position.coords.latitude;
        let longitude = position.coords.longitude;
        let id_kecamatan = getIdKecamatanFromUrl(); // Mendapatkan id_kecamatan dari URL
        $.ajax({
            url: 'http://127.0.0.1:8000/api/findkecamatan',
            type: 'POST',
            data: {
                id_kecamatan: id_kecamatan, // Mengirim id_kecamatan
                latitude: latitude,
                longitude: longitude,
                _token: '{{ csrf_token() }}' // CSRF token untuk Laravel
            },
            success: function(response) {
                let no =1;
                const data = response.data[0];
                $('#terdekat').text(data.name + ' terdekat' + ' | ' + data.distance + ' km');
                response.data.forEach(function(data) {
                    // Buat teks yang akan dimasukkan ke dalam elemen dengan ID yang sesuai dengan nama
                    let distanceText = '   ' + data.distance + ' km';

                    // Temukan elemen dengan ID yang sama dengan 'name' dari respons
                    $('#' + no).text(distanceText);
                    no++;
                });
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

    // Function to update UI (dummy function, implement as needed)
    function updateUI(data) {
        console.log(data);
        // Update UI with the data from the response
    }

    // Call getLocation to start the process
    getLocation();
});
</script>
@endsection