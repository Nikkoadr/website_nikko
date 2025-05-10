@extends('layouts.app')
@section('title', 'Daftar Dokter')
@section('content')
<div class="container">
    <h1>Daftar Dokter</h1>
    <a href="{{ route('dokter.create') }}" class="btn btn-primary">Tambah Dokter</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Spesialis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokter as $data)
            <tr>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jk }}</td>
                <td>{{ $data->spesialis }}</td>
                <td>
                    <a href="{{ route('dokter.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('dokter.destroy', $data->id) }}" method="POST" style="display:inline;">
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
