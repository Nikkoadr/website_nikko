@extends('layouts.app')
@section('title', 'Tambah Mahasiswa')
@section('content')

<div class="container">
    <h1>Tambah Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control" required>
                <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="prodi">Program Studi</label>
            <select name="prodi" id="prodi" class="form-control" required>
                <option value="" disabled selected>Pilih Program Studi</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Akuntansi">Akuntansi</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ old('tgl_lahir') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="nonreg">
                <input type="checkbox" name="nonreg" id="nonreg" value="1" {{ old('nonreg') ? 'checked' : '' }}>
                Non-Reguler
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
