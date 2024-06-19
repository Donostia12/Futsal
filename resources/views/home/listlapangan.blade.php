@extends('home.header')
@section('content')
<section class="trending pb-0">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-6 ">
            <div class="col-lg-7">
                <div class="section-title text-center text-lg-start">
                    <h4 class="mb-1 theme1">Top pokoknya</h4>
                    <h2 class="mb-1">Best <span class="theme">Lapangan Futsal</span></h2>
                    <p>Silahkan Di Lihat2 terlebih dahulu.</p>
                </div>
            </div>
            <div class="col-lg-5">

            </div>
        </div>
        <div class="trend-box">
            <div class="row item-slider">
                @foreach ($data as $item)
                @if(!empty($item)) <!-- Pastikan $item tidak kosong -->
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="{{ asset('images/' . $item['image']) }}" alt="image">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">
                                <div class="trend-meta bg-theme white px-3 py-2 rounded">
                                    <div class="entry-author">
                                        <i class="icon-calendar"></i>
                                        <span class="fw-bold"> km</span>
                                    </div>
                                </div>
                                <h5 class="theme mb-1"><i class="flaticon-location-pin"></i> {{ $item['kecamatan'] }}</h5>
                                <h3 class="mb-1"><a href="{{ route('detail', ['id'=>$item['id']]) }}">{{ $item['name'] }}</a></h3>
                                <div class="rating-main d-flex align-items-center pb-2">
                                    <div class="rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </div>
                                    <span class="ms-2">(12)</span>
                                </div>
                                <p class="border-b pb-2 mb-2">{{ $item['desc'] }}</p>
                                <div class="entry-meta">
                                    <div class="entry-author d-flex align-items-center">
                                        <p class="mb-0"><span class="theme fw-bold fs-5">{{ $item['harga'] }}</span> | Per person</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            
            </div>
        </div>
     
    </div>
</section>

@endsection