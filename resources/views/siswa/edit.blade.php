



@extends('layout.template')
<!-- START FORM -->
@section('konten')

@if ($errors->any())
<div class="pt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
                
            @endforeach
        </ul>
    </div>
</div>
    
@endif
<form action='{{url('siswa/'.$data->nis)}}' method='post'>
    @csrf
    @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">

            <a href='{{url('siswa')}}' class="btn btn-secondary"><< Kembali</a>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                  {{$data->nis}}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value ="{{ $data->nama}}" id="nama">
                </div>
            </div>
            <div class="form-group row">
                <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat'  value ="{{ $data->alamat}}" id="alamat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
        </div>
            
    </form>
        <!-- AKHIR FORM -->
        @endsection