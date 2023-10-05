@extends('layout.template')
<!-- START DATA -->
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- TOMBOL TAMBAH DATA -->
    <a href='{{ url('task') }}' class="btn btn-secondary">
        << kembali</a>

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
                            <form class='d-inline' action="{{ url('task/'.$item->id).'/status' }}" method="post">
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
                            <a href='{{ url('task/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus tugas ini?')" class='d-inline' action="{{ url('task/'.$item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>
                        </td>

                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>

</div>
<!-- AKHIR DATA -->
@endsection