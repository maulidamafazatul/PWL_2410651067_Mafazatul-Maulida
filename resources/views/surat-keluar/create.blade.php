@extends('layouts.app')
@section('title', 'Tambah Surat Keluar')
@section('content')
  <h1 class="mb-1 text-3xl font-bold text-slate-900">Tambah Surat Keluar</h1>
  <p class="mb-6 text-slate-500">Isi data surat yang akan dikirim.</p>
  <div class="max-w-2xl rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
  <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <p class="mb-5 flex flex-col gap-1.5 text-sm font-semibold text-slate-900">Nomor Surat :
        <input name="nomor_surat" value="{{ old('nomor_surat') }}" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 font-normal text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('nomor_surat') <span class="text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="mb-5 flex flex-col gap-1.5 text-sm font-semibold text-slate-900">Tanggal :
        <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 font-normal text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('tanggal') <span class="text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="mb-5 flex flex-col gap-1.5 text-sm font-semibold text-slate-900">Tujuan :
        <input name="tujuan" value="{{ old('tujuan') }}" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 font-normal text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('tujuan') <span class="text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="mb-5 flex flex-col gap-1.5 text-sm font-semibold text-slate-900">Perihal :
        <input name="perihal" value="{{ old('perihal') }}" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 font-normal text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        @error('perihal') <span class="text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="mb-5 flex flex-col gap-1.5 text-sm font-semibold text-slate-900">Keterangan :
        <textarea name="keterangan" rows="4" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 font-normal text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">{{ old('keterangan') }}</textarea>
        @error('keterangan') <span class="text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="mb-5 flex flex-col gap-1.5 text-sm font-semibold text-slate-900">
        <label>Kategori</label>
        <select name="category_id" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2.5 font-normal text-slate-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
          <option value="">-- Tanpa kategori --</option>
          @foreach ($categories as $kategori)
            <option value="{{ $kategori->id }}" @selected(old('category_id') == $kategori->id)>{{ $kategori->nama }}</option>
          @endforeach
        </select>
        @error('category_id') <span class="text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <p class="mb-5 flex flex-col gap-1.5 text-sm font-semibold text-slate-900">
        <label>Lampiran (PDF/JPG/PNG, maks. 2 MB)</label>
        <input type="file" name="lampiran" accept=".pdf,.jpg,.jpeg,.png" class="w-full rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-sm font-normal text-slate-700 file:mr-3 file:rounded-md file:border-0 file:bg-indigo-50 file:px-3 file:py-1.5 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-100">
        @error('lampiran') <span class="text-sm font-normal text-red-600">{{ $message }}</span> @enderror
    </p>
    <div class="flex items-center gap-3">
      <button type="submit" class="rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white hover:bg-indigo-700">Simpan</button>
      <a href="{{ route('surat-keluar.index') }}" class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-medium text-slate-600 hover:bg-slate-50">Batal</a>
    </div>
  </form>
  </div>
@endsection