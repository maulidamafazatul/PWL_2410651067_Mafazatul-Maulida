@extends('layouts.app')
@section('title', 'Daftar Surat Keluar')
@section('content')
  <div class="mb-6 flex items-start justify-between gap-4">
    <div>
      <h1 class="text-3xl font-bold text-slate-900">Daftar Surat Keluar</h1>
      <p class="mt-1 text-slate-500">Seluruh surat yang dikirim.</p>
    </div>
    @can('manage-letters')
      <a href="{{ route('surat-keluar.create') }}"
         class="inline-block rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white hover:bg-indigo-700">
        + Tambah Surat
      </a>
    @endcan
  </div>

  @if (session('success'))
    <div class="mb-4 rounded-xl border border-green-200 bg-green-100 px-4 py-3 text-green-800">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
    <table class="w-full border-collapse text-left">
      <thead>
        <tr class="border-b border-slate-200 text-xs font-semibold uppercase tracking-wide text-green-900">
          <th class="px-5 py-4">No</th>
          <th class="px-5 py-4">Nomor</th>
          <th class="px-5 py-4">Tanggal</th>
          <th class="px-5 py-4">Tujuan</th>
          <th class="px-5 py-4">Perihal</th>
          <th class="px-5 py-4">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-slate-100">
        @forelse ($suratKeluar as $surat)
          <tr class="text-slate-800">
            <td class="px-5 py-4 text-slate-500">{{ $loop->iteration }}</td>
            <td class="px-5 py-4 font-semibold text-slate-900">{{ $surat->nomor_surat }}</td>
            <td class="px-5 py-4">{{ $surat->tanggal }}</td>
            <td class="px-5 py-4">{{ $surat->tujuan }}</td>
            <td class="px-5 py-4">{{ $surat->perihal }}</td>
            <td class="px-5 py-4">
              <div class="flex items-center gap-2">
                <a href="{{ route('surat-keluar.show', $surat->id) }}"
                   class="rounded-lg border border-sky-200 bg-sky-50 px-3.5 py-2 text-sm font-medium text-sky-700 hover:bg-sky-100">Detail</a>
                @can('manage-letters')
                  <a href="{{ route('surat-keluar.edit', $surat->id) }}"
                     class="rounded-lg border border-amber-200 bg-amber-50 px-3.5 py-2 text-sm font-medium text-amber-700 hover:bg-amber-100">Edit</a>
                  <form method="POST" action="{{ route('surat-keluar.destroy', $surat->id) }}"
                        onsubmit="return confirm('Yakin ingin menghapus surat ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="rounded-lg border border-red-200 bg-red-50 px-3.5 py-2 text-sm font-medium text-red-700 hover:bg-red-100">Hapus</button>
                  </form>
                @endcan
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-5 py-10 text-center text-slate-500">Belum ada surat keluar.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection