@extends('layouts.app')
@section('title', 'Detail Barang')
@section('content')
<div class="container">
    <h1>Detail Barang</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
            <p class="card-text"><strong>Kode Barang:</strong> {{ $barang->kode_barang }}</p>
            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($barang->harga, 0, ',', '.') }}</p>
            <a href="{{ route('barang.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
