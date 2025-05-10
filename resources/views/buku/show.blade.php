@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="container">
    <h1>Detail Buku</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $buku->judul }}</h5>
            <p class="card-text"><strong>Kode Buku:</strong> {{ $buku->kode_buku }}</p>
            <p class="card-text"><strong>Pengarang:</strong> {{ $buku->pengarang }}</p>
            <p class="card-text"><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
            <p class="card-text"><strong>Tahun:</strong> {{ $buku->tahun }}</p>
            @if($buku->foto_cover)
                <p><strong>Foto Cover:</strong></p>
                <img src="{{ asset('storage/foto_cover/' . $buku->foto_cover) }}" width="150" alt="Cover Buku">
            @else
                <p class="text-muted">Tidak Ada Foto Cover</p>
            @endif
            <br>
            <a href="{{ route('buku.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
