@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
<div class="container">
    <h1>Daftar Karyawan</h1>
    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $karyawan)
            <tr>
                <td>{{ $karyawan->nip }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td>{{ \Carbon\Carbon::parse($karyawan->tgl_lahir)->format('d-m-Y') }}</td>
                <td>
                    @if($karyawan->foto)
                        <img src="{{ asset('storage/foto_karyawan/' . $karyawan->foto) }}" width="50" height="50" alt="Foto Karyawan" class="rounded">
                    @else
                        <span class="text-muted">Tidak Ada Foto</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus karyawan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
