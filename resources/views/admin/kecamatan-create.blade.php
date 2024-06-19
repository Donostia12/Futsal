@extends('admin.header')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Kecamatan</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form class="d-flex align-items-center flex-wrap flex-md-nowrap" action="{{ route('kecamatan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3 mb-2">
                        <label class="sr-only">Nama Kecamatan</label>
                        <input type="text" readonly class="form-control-plaintext" value="Nama Kecamatan">
                    </div>
                    <div class="mb-2 mx-sm-2">
                        <label class="sr-only">Masukan nama Kecamatan disini</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan Kecamatan Disini">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection