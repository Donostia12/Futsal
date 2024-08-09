@extends('home.header')
@section('content')
<section class="trending pb-0">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-6 ">
            <div class="col-lg-7">
                <div class="section-title text-center text-lg-start">
                    <h4 class="mb-1 theme1">Pilihan Terbaik</h4>
                    <h2 class="mb-1">Nikmati <span class="theme">Lapangan Futsal Terbaik</span></h2>
                    <p>Temukan lapangan futsal impian Anda dan rasakan pengalaman bermain yang luar biasa. Lihat pilihan kami sekarang!</p>
                    
                </div>
            </div>
            <div class="col-lg-5">
                <input type="text" id="location-input" placeholder="Masukkan lokasi" />
                <button class="nir-btn white" id="search-btn" style="margin-top: 20px; float: right;">Cari</button>             
            </div>
        </div>
       @php
            $no =1
       @endphp
        <div class="trend-box">
            <div class="row item-slider">
                @foreach ($distances as $item)
                @if(!empty($item)) <!-- Pastikan $item tidak kosong -->
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <a href="{{ route('detail', ['id' => $item['id']]) }}" style="text-decoration: none; color: inherit; display: block;">
                            <div class="trend-item rounded box-shadow">
                                <div class="trend-image position-relative">
                                    <img src="{{ asset('images/' . $item['image']) }}" alt="image">
                                    <div class="color-overlay"></div>
                                </div>
                                <div class="trend-content p-4 pt-5 position-relative">
                                    <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                        <div class="entry-author">
                                            <i class="icon-calendar"></i>
                                            <span class="fw-bold" id="{{$no}}">{{$item['distance']}} km</span>
                                        </div>
                                    </div>
                                    <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> {{ $item['kecamatan'] }}</h5>
                                    <h3 class="mb-1">
                                        <a href="{{ route('detail-search', ['latitude' => $lat, 'longitude' => $lng, 'id' => $item['id']]) }}">
                                            {{ $item['name'] }}
                                        </a>
                                    </h3>
                                    
                                    {{-- <div class="rating-main d-flex align-items-center pb-2">
                                        <div class="rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                        </div>
                                        <span class="ms-2">(12)</span>
                                    </div> --}}
                                    <p class="border-b pb-2 mb-2">{{ $item['desc'] }}</p>
                                    <div class="entry-meta">
                                        <div class="entry-author d-flex align-items-center">
                                            <p class="mb-0"><span class="theme fw-bold fs-5">{{ $item['harga'] }}</span> | Hour</p>
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
<div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hasil Pencarian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                <div id="search-results">
                    <!-- Hasil pencarian akan muncul di sini -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close-btn" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Event listener untuk tombol cari
    document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi peta
 
    // Event listener untuk tombol cari
    document.getElementById('search-btn').addEventListener('click', function() {
            var geocoder = L.Control.Geocoder.nominatim();
            var locationInput = document.getElementById('location-input');
            if (locationInput) {
                var location = locationInput.value;
                geocoder.geocode(location, function(results) {
                    var resultDiv = document.getElementById('search-results');
                    resultDiv.innerHTML = '';
                    if (results.length > 0) {
                        results.forEach(function(result) {
                            var resultElement = document.createElement('div');
                            resultElement.innerHTML = `
                                <strong>${result.name}</strong><br>
                                Latitude: ${result.center.lat}, Longitude: ${result.center.lng}
                               
                                <br>
                                      <a class="nir-btn white" href="http://127.0.0.1:8000/lokasi?lat=${result.center.lat}&lng=${result.center.lng}" >
                                        Lihat Lokasi
                                    </a>
                            </a>
                            `;
                            resultElement.style.cursor = 'pointer'; 
                          
                            resultDiv.appendChild(resultElement);
                            resultDiv.innerHTML += '<hr>';
                        });
                    } else {
                        resultDiv.innerText = 'Lokasi tidak ditemukan.';
                    }
                    $('#resultModal').modal('show');
                });
            } else {
                console.error('Element with ID location-input not found');
            }
        });

        document.getElementById('close-btn').addEventListener('click', function() {
            var boxElement = document.getElementById('box');
            if (boxElement) {
                boxElement.style.display = 'block';
            }
        });
    });
</script>
@endsection