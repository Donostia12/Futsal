@extends('admin.header')
@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Management Review Lapangan Futsal</h4>
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
                            <th>email</th>
                            <th>desc</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no =1;
                        @endphp
                        @foreach ($review as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->desc}}</td>

                            <td>
                                <div class="d-flex">
                
                                    <form action="{{ route('review.destroy', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
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