@extends('layouts.app')
@section('title', 'Daftar Mahasiswa')
@section('content')
<div class="container">
    <h1>Daftar Mahasiswa</h1>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Prodi</th>
                <th>Tanggal Lahir</th>
                <th>Non-Reguler</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
            <tr>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->jk }}</td>
                <td>{{ $mahasiswa->prodi }}</td>
                <td>{{ \Carbon\Carbon::parse($mahasiswa->tgl_lahir)->translatedFormat('d F Y') }}</td>
                <td>{{ $mahasiswa->nonreg ? 'Ya' : 'Tidak' }}</td>
                <td>
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
