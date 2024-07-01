@extends('admin.header')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Management Kecamatan</h4>
        </div>
        <div class="card-body">
            <a href="{{route('kecamatan-create')}}">   <button type="button" class="btn btn-rounded btn-info"><span
                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
            </span>Add</button>
        </div></a>
         @session('success')
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil</strong> {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
         @endsession
         @session('error')
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal</strong> {{ session("error") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
         @endsession
       
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                         
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kecamatan as $item)
                        <tr>
                           
                            <td>{{$item->name}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('kecamatan.edit', $item->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{ route('kecamatan.destroy', $item->id) }}" class="btn btn-danger shadow btn-xs sharp" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('kecamatan.destroy', $item->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                  
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