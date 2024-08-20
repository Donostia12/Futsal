@extends('admin.header')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Management Lapangan Futsal</h4>
        </div>
        <div class="card-body">
        
            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="name">
                <input type="text" class="form-control"name="id" value="{{$id}}" hidden>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            </form>
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
                           
                            <th>image</th>
                            <th>waktu</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                                
                          
                            <td><img src="{{ asset('images/' . $item->image) }}" alt=""></td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('image.destroy', $item->id) }}" class="btn btn-danger shadow btn-xs sharp" 
                                       onclick="event.preventDefault(); confirmDeletion({{ $item->id }});">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form-{{$item->id}}" action="{{ route('image.destroy', $item->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>	
                                <script>
                                    function confirmDeletion(id) {
                                        if (confirm('Apakah Anda yakin ingin menghapus image ini?')) {
                                            document.getElementById('delete-form-' + id).submit();
                                        }
                                    }
                                </script>
                                                                            
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