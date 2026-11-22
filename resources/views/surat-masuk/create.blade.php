@extends('layouts.app')
@section('title', 'Tambah Surat Masuk')
@section('content')
    <div class="mx-auto max-w-2xl">
        <h1 class="mb-6 text-2xl font-bold text-slate-900">Tambah Surat Masuk</h1>
 
        <div class="card p-6">
            <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">    
                @csrf
 
                <div>
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}"
                           class="form-input @error('nomor_surat') border-red-500 @enderror">
                    @error('nomor_surat') <p class="form-error">{{ $message }}</p> @enderror
                </div>
 
                <div>
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}"
                           class="form-input @error('tanggal') border-red-500 @enderror">
                    @error('tanggal') <p class="form-error">{{ $message }}</p> @enderror
                </div>
 
                <div>
                    <label for="pengirim" class="form-label">Pengirim</label>
                    <input id="pengirim" name="pengirim" value="{{ old('pengirim') }}"
                           class="form-input @error('pengirim') border-red-500 @enderror">
                    @error('pengirim') <p class="form-error">{{ $message }}</p> @enderror
                </div>
 
                <div>
                    <label for="perihal" class="form-label">Perihal</label>
                    <input id="perihal" name="perihal" value="{{ old('perihal') }}"
                           class="form-input @error('perihal') border-red-500 @enderror">
                    @error('perihal') <p class="form-error">{{ $message }}</p> @enderror
                </div>
 
                <div>
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="4"
                              class="form-input @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                    @error('keterangan') <p class="form-error">{{ $message }}</p> @enderror
                </div>

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
 
                <div class="flex items-center gap-3 border-t border-slate-100 pt-5">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection

