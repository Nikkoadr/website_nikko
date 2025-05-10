@extends('layouts.app')
@section('title', 'Edit Mahasiswa')
@section('content')

<div class="container">
    <h1>Edit Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control" required>
                <option value="L" {{ old('jk', $mahasiswa->jk) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jk', $mahasiswa->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="prodi">Program Studi</label>
            <select name="prodi" id="prodi" class="form-control" required>
                <option value="" disabled>Pilih Program Studi</option>
                <option value="Teknik Informatika" {{ old('prodi', $mahasiswa->prodi) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                <option value="Sistem Informasi" {{ old('prodi', $mahasiswa->prodi) == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                <option value="Teknik Elektro" {{ old('prodi', $mahasiswa->prodi) == 'Teknik Elektro' ? 'selected' : '' }}>Teknik Elektro</option>
                <option value="Teknik Mesin" {{ old('prodi', $mahasiswa->prodi) == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
                <option value="Akuntansi" {{ old('prodi', $mahasiswa->prodi) == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $mahasiswa->tgl_lahir) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="nonreg">
                <input type="checkbox" name="nonreg" id="nonreg" value="1" {{ old('nonreg', $mahasiswa->nonreg) ? 'checked' : '' }}>
                Non-Reguler
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
