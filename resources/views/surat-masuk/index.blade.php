@extends('layouts.app')
@section('title', 'Daftar Surat Masuk')
@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Daftar Surat Masuk</h1>
            <p class="mt-1 text-sm text-slate-500">Seluruh surat yang diterima.</p>
        </div>

        @can('manage-letters')
            <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary">+ Tambah Surat</a>
        @endcan
    </div>

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('surat-masuk.index') }}" class="mb-4 flex flex-wrap items-center gap-3">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Nomor, pengirim, atau perihal"
               class="min-w-[240px] flex-1 rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        <select name="category_id"
                class="rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 text-sm text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <option value="">Semua kategori</option>
            @foreach ($categories as $kategori)
                <option value="{{ $kategori->id }}" @selected(request('category_id') == $kategori->id)>{{ $kategori->nama }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Cari / Filter</button>
        <a href="{{ route('surat-masuk.index') }}" class="btn btn-info">Reset</a>
    </form>

    <div class="card overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 text-sm">
            <thead class="bg-brand-50 text-left text-xs font-semibold uppercase tracking-wide text-brand-700">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nomor</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Pengirim</th>
                    <th class="px-4 py-3">Perihal</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($suratMasuk as $surat)
                    <tr class="hover:bg-brand-50">
                        <td class="px-4 py-3 text-slate-500">{{ $suratMasuk->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-3 font-medium text-slate-900">{{ $surat->nomor_surat }}</td>
                        <td class="whitespace-nowrap px-4 py-3">{{ $surat->tanggal }}</td>
                        <td class="px-4 py-3">{{ $surat->pengirim }}</td>
                        <td class="px-4 py-3">{{ $surat->perihal }}</td>
                        <td class="px-4 py-3">{{ $surat->category?->nama ?? 'Tanpa kategori' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex flex-wrap items-center gap-2">
                                <a href="{{ route('surat-masuk.show', $surat->id) }}" class="btn btn-info">Detail</a>

                                @can('manage-letters')
                                    <a href="{{ route('surat-masuk.edit', $surat->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Hapus surat ini?')">Hapus</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-10 text-center text-slate-500">Belum ada surat masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-5 flex items-center justify-between text-sm text-slate-600">
        <span>Halaman {{ $suratMasuk->currentPage() }} dari {{ $suratMasuk->lastPage() }}</span>
        <div class="flex gap-2">
            @if ($suratMasuk->previousPageUrl())
                <a href="{{ $suratMasuk->previousPageUrl() }}" class="btn btn-info">Sebelumnya</a>
            @endif
            @if ($suratMasuk->nextPageUrl())
                <a href="{{ $suratMasuk->nextPageUrl() }}" class="btn btn-info">Berikutnya</a>
            @endif
        </div>
    </div>
@endsection