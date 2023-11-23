@extends('layout.template')

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

<form action='{{ url('siswa/'.$data->nis) }}' method='post'>
    @csrf
    @method('PATCH')
    
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('siswa') }}' class="btn btn-secondary"><< Kembali</a>

        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nis' value="{{ old('nis', $data->nis) }}" id="nis">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{ old('nama', $data->nama) }}" id="nama">
            </div>
        </div>

        <div class="form-group row">
            <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                    <option value="Laki-laki" {{ old('jeniskelamin', $data->jeniskelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jeniskelamin', $data->jeniskelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' value="{{ old('alamat', $data->alamat) }}" id="alamat">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <div class="input-group date">
                    <input type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir', $data->tgl_lahir) }}" id="tgl_lahir">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" onclick="return confirm('yakin ingin melanjutkan?')">SIMPAN</button>
    </div>
</form>

<!-- Script for datepicker -->
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

@endsection
