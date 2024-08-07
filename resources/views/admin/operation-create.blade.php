@extends('admin.header')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Operational Waktu Lapangan Futsal</h4>
        </div>
        <div class="card-body">
        
            <form action="{{route('operation.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 ">
                    <label for="image" class="form-label">Tambahkan Data Operasi</label>
                </div>
                <div class="row">
                    <input type="text" class="form-control"name="id_lapangan" value="{{$id}}" hidden>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Senin Buka</label>
                        <input type="time" class="form-control" name="senin_buka" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Senin Tutup</label>
                        <input type="time" class="form-control" name="senin_tutup" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Selasa Buka</label>
                        <input type="time" class="form-control" name="selasa_buka" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Selasa Tutup</label>
                        <input type="time" class="form-control" name="selasa_tutup" value="" >
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Rabu Buka</label>
                        <input type="time" class="form-control" name="rabu_buka" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Rabu Tutup</label>
                        <input type="time" class="form-control" name="rabu_tutup" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Kamis Buka</label>
                        <input type="time" class="form-control" name="kamis_buka" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Kamis Tutup</label>
                        <input type="time" class="form-control" name="kamis_tutup" value="" >
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Jumat Buka</label>
                        <input type="time" class="form-control" name="jumat_buka" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Jumat Tutup</label>
                        <input type="time" class="form-control" name="jumat_tutup" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Sabtu Buka</label>
                        <input type="time" class="form-control" name="sabtu_buka" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Sabtu Tutup</label>
                        <input type="time" class="form-control" name="sabtu_tutup" value="" >
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Minggu Buka</label>
                        <input type="time" class="form-control" name="minggu_buka" value="" >
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="text" class="form-label">Minggu Tutup</label>
                        <input type="time" class="form-control" name="minggu_tutup" value="" >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Berhasil</strong> {{ session("success") }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
       @endsession
       
      
    </div>
</div>
@endsection