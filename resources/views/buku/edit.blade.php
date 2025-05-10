@extends('layouts.app')
@section('title', 'Edit Buku')
@section('content')
<div class="container">
    <h1>Edit Buku</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="kode_buku">Kode Buku</label>
            <input type="text" name="kode_buku" id="kode_buku" class="form-control" value="{{ old('kode_buku', $buku->kode_buku) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $buku->judul) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" id="pengarang" class="form-control" value="{{ old('pengarang', $buku->pengarang) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{ old('penerbit', $buku->penerbit) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tahun">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control" value="{{ old('tahun', $buku->tahun) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="foto_cover">Foto Cover (opsional)</label>
            <input type="file" name="foto_cover" id="foto_cover" class="form-control">
            @if($buku->foto_cover)
                <p>Foto Saat Ini:</p>
                <img src="{{ asset('storage/foto_cover/' . $buku->foto_cover) }}" width="100" alt="Cover Buku">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
