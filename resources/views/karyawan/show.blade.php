@extends('layouts.app')

@section('title', 'Detail Karyawan')

@section('content')
<div class="container">
    <h1>Detail Karyawan</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $karyawan->nama }}</h5>
            <p class="card-text"><strong>NIP:</strong> {{ $karyawan->nip }}</p>
            <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $karyawan->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
            <p class="card-text"><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($karyawan->tgl_lahir)->format('d-m-Y') }}</p>

            @if($karyawan->foto)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $karyawan->foto) }}" width="150" alt="Foto Karyawan" class="rounded">
                </div>
            @endif
            
            <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
