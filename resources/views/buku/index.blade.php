@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Foto Cover</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)
            <tr>
                <td>{{ $item->kode_buku }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->pengarang }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun }}</td>
                <td>
                    @if($item->foto_cover)
                        <img src="{{ asset('storage/foto_cover/' . $item->foto_cover) }}" width="50" height="50" alt="Cover Buku">
                    @else
                        Tidak Ada Cover
                    @endif
                </td>
                <td>
                    <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
