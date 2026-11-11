{{-- <!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>

    <header>
        <h2>Sistem Informasi Surat</h2>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <hr>
    <footer>
        <p>Sistem Informasi Surat</p>
    </footer>

</body>
</html> --}}

@extends('layouts.app')
@section('title', 'Daftar Surat Masuk')
@section('content')
<h1>Daftar Surat Masuk</h1>
<a href="{{ route('surat-masuk.create') }}">+ Tambah Surat</a>
@can('manage-letters')
     <a href="{{ route('surat-masuk.create') }}">+ Tambah Surat</a>
@endcan

@if (session('success'))
     <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>No</th><th>Nomor</th><th>Tanggal</th>
            <th>Pengirim</th><th>Perihal</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($suratMasuk as $surat)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $surat->nomor_surat }}</td>
            <td>{{ $surat->tanggal }}</td>
            <td>{{ $surat->pengirim }}</td>
            <td>{{ $surat->perihal }}</td>
            <td>
                                <a href="{{ route('surat-masuk.show', $surat->id) }}">Detail</a>
                <a href="{{ route('surat-masuk.edit', $surat->id) }}">Edit</a>
                <form action="{{ route('surat-masuk.destroy', $surat->id) }}"
                     method="POST" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                  onclick="return confirm('Hapus surat ini?')">Hapus</button>
                </form>
                @can('manage-letters')
                     <a href="{{ route('surat-masuk.edit', $surat->id) }}">Edit</a>
                     <form action="{{ route('surat-masuk.destroy', $surat->id) }}"
                           method="POST" style="display:inline">
                         @csrf
                         @method('DELETE')
                         <button type="submit"
                             onclick="return confirm('Hapus surat ini?')">Hapus</button>
                     </form>
                 @endcan

                </td>
        </tr>
    @empty
        <tr><td colspan="6">Belum ada surat masuk.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
