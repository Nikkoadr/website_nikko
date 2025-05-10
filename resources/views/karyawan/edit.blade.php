@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('content')
<div class="container">
    <h1>Edit Karyawan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip', $karyawan->nip) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $karyawan->nama) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control" required>
                <option value="L" {{ old('jk', $karyawan->jk) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jk', $karyawan->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $karyawan->tgl_lahir) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @if($karyawan->foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/foto_karyawan/' . $karyawan->foto) }}" width="100" alt="Foto Karyawan">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
