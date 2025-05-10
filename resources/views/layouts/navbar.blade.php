<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('cv') ? 'active' : '' }}" href="{{ route('cv') }}">CV</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dokter.index') ? 'active' : '' }}" href="{{ route('dokter.index') }}">Dokter</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('barang.index') ? 'active' : '' }}" href="{{ route('barang.index') }}">Barang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('mahasiswa.index') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('karyawan.index') ? 'active' : '' }}" href="{{ route('karyawan.index') }}">Karyawan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('buku.index') ? 'active' : '' }}" href="{{ route('buku.index') }}">Buku</a>
    </li>
</ul>
