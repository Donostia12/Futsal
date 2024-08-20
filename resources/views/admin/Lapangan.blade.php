@extends('admin.header')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Management Lapangan Futsal</h4>
        </div>
        <div class="card-body">
            <a href="{{route('lapangan.create')}}">      <button type="button" class="btn btn-rounded btn-info"><span
                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
            </span>Add</button></a>
        </div>
        @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Berhasil</strong> {{ session("success") }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>
       @endsession
       
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Telepon</th>
                            <th>kecamatan</th>
                            <th>Harga</th>
                            <th>Jumlah Lapangan</th>
                            <th>Alamat</th>
                            <th>Deskripsi</th>
                            <th>Status-IMG</th>
                            <th>Status-Op</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no =1;
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['telp']}}</td>
                            <td>{{$item['kecamatan']}}</td>
                            <td>{{$item['harga']}}</td>
                            <td class="text-center align-middle">{{$item['jumlah']}}</td>
                            <td>{{$item['alamat']}}</td>
                            <td>{{$item['desc']}}</td>	
                            <td>{{$item['image-status']}}</td>
                            <td>{{$item['operation-status']}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('lapangan.show', $item['id']) }}" class="btn btn-primary shadow btn-xs sharp me-2">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('lapangan.destroy', $item['id']) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lapangan futsal ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger shadow btn-xs sharp me-2">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('image.show', $item['id']) }}" class="btn btn-danger shadow btn-xs sharp me-2">
                                        <i class="fa fa-image"></i>
                                    </a>
                                    <a href="{{ route('operation.show', $item['id']) }}" class="btn btn-danger shadow btn-xs sharp">
                                        <i class="fa fa-clock"></i>
                                    </a>
                                </div>
                                                                            
                            </td>
                            											
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection