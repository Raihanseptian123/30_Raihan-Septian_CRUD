


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
<form action='{{url('siswa')}}' method='post'>
    @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{url('siswa')}}' class="btn btn-secondary"><< Kembali</a>
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nis' value ="{{ Session::get('nis')}}" id="nis">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value ="{{ Session::get('nama')}}" id="nama">
                </div>
                <div class="form-group row">
                    <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jeniskelamin" value ="{{ Session::get('jeniskelamin')}}" id="jeniskelamin" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <div class="input-group date">
                            <input type="date" class="form-control" name="tgl_lahir" value="{{ Session::get('tgl_lahir') }}" id="tgl_lahir">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat'  value ="{{ Session::get('alamat')}}" id="alamat">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('yakin ingin melanjutkan?')">TAMBAH</button> 
                </div>
                
        </div>

        <script>
            $(function() {
                // Aktifkan datepicker untuk input tanggal lahir
                $("#tanggallahir").datepicker({
                    format: 'yyyy-mm-dd', // Format tanggal
                    autoclose: true,
                    todayHighlight: true
                });
            });
        </script>
    </form>
        <!-- AKHIR FORM -->
        @endsection