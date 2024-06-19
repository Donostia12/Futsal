@extends('admin.header')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Lapangan Futsal </h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="{{ route('lapangan.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nama Lapangan Futsal</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Lapangan futsal">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="harga">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Desc</label>
                        <input type="text" class="form-control" name="desc" placeholder="Masukan deskripsi disini">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Kecamatan</label>
                        <select id="inputState" class="default-select form-control wide" name="kecamatan">
                            <option selected>Choose...</option>
                            @foreach ($kecamatan as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">No telp</label>
                        <input type="text" class="form-control" name="telp" placeholder="Nomer Telpon">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Jumlah Lapangan</label>
                        <input type="text" class="form-control" name="jml" placeholder="Masukan Jumlah Lapangan">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">latitude</label>
                        <input type="text" class="form-control" name="latitude" id="lat">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">logitude</label>
                        <input type="text" class="form-control" name="longitude" id="long">
                    </div>
                    <div class="mb-3 col-md-12">
                       
                    <div id="map" style="width: 100%; height: 600px;"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>    

<script>

	const map = L.map('map').setView([-8.675050, 115.217402],13);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
	
    function onMapClick(e) {
            document.getElementById('lat').value = e.latlng.lat;
            document.getElementById('long').value = e.latlng.lng;
        }
        map.on('click', onMapClick);
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

</script>

@endsection