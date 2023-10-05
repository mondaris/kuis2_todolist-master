@extends('layout.template')
<!-- START FORM -->
@section('konten')

<form action='{{ url('task/'.$data->id) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('task') }}' class="btn btn-secondary">
            << kembali</a>
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='judul' value="{{ $data->judul }}" id="judul">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='deskripsi' value="{{ $data->deskripsi }}" id="deskripsi">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection