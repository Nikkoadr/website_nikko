@extends('layouts.app')
@section('title', 'Detail Dokter')
@section('content')
<div class="container">
    <h1>Detail Dokter</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $dokter->nama }}</h5>
            <p class="card-text"><strong>NIP:</strong> {{ $dokter->nip }}</p>
            <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $dokter->jk }}</p>
            <p class="card-text"><strong>Spesialis:</strong> {{ $dokter->spesialis }}</p>
            <a href="{{ route('dokter.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
