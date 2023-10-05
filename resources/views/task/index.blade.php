@extends('layout.template')
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <!-- Tombol untuk versi mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Daftar menu -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('task')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('task/belumselesai') }}" >Task Belum Selesai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('task/selesai') }}" >Task Sudah Selesai</a>
            </li>
        </ul>
    </div>
</nav>
<!-- START DATA -->
@section('konten')    
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='{{ url('task/create') }}' class="btn btn-primary">+ Tambah Tugas</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Judul</th>
                <th class="col-md-4">Deskripsi</th>
                <th class="col-md-2">Status</th>
                <th class="col-md-2">Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <form  class='d-inline' action="{{ url('task/'.$item->id).'/status' }}" method="post">
                        @csrf 
                        @method('PUT')
                        <select name="status" id="status">
                            <option value="{{$item->status}}">{{$item->status}}</option>
                            @if ($item->status=='Belum Selesai')
                                <option value="Selesai">Selesai</option>
                            @else
                                <option value="Belum Selesai">Belum Selesai</option>
                            @endif
                        </select>
                        <button type="submit" name="submit" class="btn btn-primary btn-sm mt-2">Update</button>
                    </form>
                </td>
                
                <td>
                    <div class="pb-3">
                        <a href='{{ route('task.show',$item->id) }}' class="btn btn-primary">Detail</a>
                    </div>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
   
</div>
<!-- AKHIR DATA -->
@endsection
    