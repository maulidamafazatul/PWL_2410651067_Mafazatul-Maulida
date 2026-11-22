@extends('layouts.app')
@section('title', 'Detail Surat Keluar')
@section('content')
  <div class="mb-6">
    <h1 class="text-3xl font-bold text-slate-900">Detail Surat Keluar</h1>
    <p class="mt-1 text-slate-500">Informasi lengkap surat.</p>
  </div>

  <div class="max-w-2xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
    <dl class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-[160px_1fr]">
      <dt class="text-slate-500">Nomor</dt>
      <dd class="font-medium text-slate-900">{{ $surat->nomor_surat }}</dd>
      <dt class="text-slate-500">Tanggal</dt>
      <dd class="font-medium text-slate-900">{{ $surat->tanggal }}</dd>
      <dt class="text-slate-500">Tujuan</dt>
      <dd class="font-medium text-slate-900">{{ $surat->tujuan }}</dd>
      <dt class="text-slate-500">Perihal</dt>
      <dd class="font-medium text-slate-900">{{ $surat->perihal }}</dd>
      <dt class="text-slate-500">Keterangan</dt>
      <dd class="font-medium text-slate-900">{{ $surat->keterangan ?? '-' }}</dd>
    </dl>
    <div class="mt-6">
      <a href="{{ route('surat-keluar.index') }}" class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-medium text-slate-600 hover:bg-slate-50">Kembali</a>
    </div>
  </div>
@endsection