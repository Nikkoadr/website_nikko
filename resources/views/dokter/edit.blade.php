@extends('layouts.app')
@section('title', 'Tambah Dokter')
@section('content')
<div class="container mt-4">
    <h1>Edit Dokter</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" id="nip" name="nip" class="form-control" value="{{ old('nip', $dokter->nip) }}" maxlength="18" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $dokter->nama) }}" maxlength="50" required>
                </div>
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select id="jk" name="jk" class="form-select" required>
                        <option value="L" {{ old('jk', $dokter->jk) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ old('jk', $dokter->jk) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="spesialis" class="form-label">Spesialis</label>
                    <input type="text" id="spesialis" name="spesialis" class="form-control" value="{{ old('spesialis', $dokter->spesialis) }}" maxlength="50" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
