@extends('layouts.app')
@section('title', 'Detail Mahasiswa')
@section('content')

<div class="container">
    <h1>Detail Mahasiswa</h1>

    <div class="card mb-3 shadow">
        <div class="card-body">
            <h5 class="card-title">{{ $mahasiswa->nama }}</h5>
            <p class="card-text"><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
            <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $mahasiswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>

            <p class="card-text">
                <strong>Prodi:</strong>
                @php
                    $prodiList = [
                        'TI' => 'Teknik Informatika',
                        'SI' => 'Sistem Informasi',
                        'TE' => 'Teknik Elektro',
                        'TM' => 'Teknik Mesin',
                        'AK' => 'Akuntansi'
                    ];
                @endphp
                {{ $prodiList[$mahasiswa->prodi] ?? 'Tidak Diketahui' }}
            </p>

            <p class="card-text"><strong>Tanggal Lahir:</strong> {{ date('d-m-Y', strtotime($mahasiswa->tgl_lahir)) }}</p>
            <p class="card-text"><strong>Non-Reguler:</strong> {{ $mahasiswa->nonreg ? 'Ya' : 'Tidak' }}</p>

            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>

@endsection
