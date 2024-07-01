@extends('admin.header')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Operational Waktu Lapangan Futsal</h4>
        </div>
        <div class="card-body">
        
            <form action="{{ route('operation.update', $id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="image" class="form-label">Tambahkan Data Operasi</label>
                </div>
                
                <div class="mb-3">
                    <label for="text" class="form-label">Senin Buka</label>
                    <input type="time" class="form-control" name="senin_buka" value="{{ $data->senin_buka }}" >
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Senin Tutup</label>
                    <input type="time" class="form-control" name="senin_tutup" value="{{ $data->senin_tutup }}" >
                </div>
                
                <div class="mb-3">
                    <label for="text" class="form-label">Selasa Buka</label>
                    <input type="time" class="form-control" name="selasa_buka" value="{{ $data->selasa_buka }}" >
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Selasa Tutup</label>
                    <input type="time" class="form-control" name="selasa_tutup" value="{{ $data->selasa_tutup }}" >
                </div>
                
                <div class="mb-3">
                    <label for="text" class="form-label">Rabu Buka</label>
                    <input type="time" class="form-control" name="rabu_buka" value="{{ $data->rabu_buka }}" >
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Rabu Tutup</label>
                    <input type="time" class="form-control" name="rabu_tutup" value="{{ $data->rabu_tutup }}" >
                </div>
                
                <div class="mb-3">
                    <label for="text" class="form-label">Kamis Buka</label>
                    <input type="time" class="form-control" name="kamis_buka" value="{{ $data->kamis_buka }}" >
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Kamis Tutup</label>
                    <input type="time" class="form-control" name="kamis_tutup" value="{{ $data->kamis_tutup }}" >
                </div>
                
                <div class="mb-3">
                    <label for="text" class="form-label">Jumat Buka</label>
                    <input type="time" class="form-control" name="jumat_buka" value="{{ $data->jumat_buka }}" >
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Jumat Tutup</label>
                    <input type="time" class="form-control" name="jumat_tutup" value="{{ $data->jumat_tutup }}" >
                </div>
                
                <div class="mb-3">
                    <label for="text" class="form-label">Sabtu Buka</label>
                    <input type="time" class="form-control" name="sabtu_buka" value="{{ $data->sabtu_buka }}" >
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Sabtu Tutup</label>
                    <input type="time" class="form-control" name="sabtu_tutup" value="{{ $data->sabtu_tutup }}" >
                </div>
                
                <div class="mb-3">
                    <label for="text" class="form-label">Minggu Buka</label>
                    <input type="time" class="form-control" name="minggu_buka" value="{{ $data->minggu_buka }}" >
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Minggu Tutup</label>
                    <input type="time" class="form-control" name="minggu_tutup" value="{{ $data->minggu_tutup }}" >
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