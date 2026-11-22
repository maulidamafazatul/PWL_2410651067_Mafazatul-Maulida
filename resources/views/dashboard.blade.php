<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')
 
@section('title', 'Dashboard')
 
@section('content')
    <div class="rounded-2xl bg-brand-700 px-8 py-10 text-white shadow">
        <h1 class="text-3xl font-extrabold text-accent">Dashboard</h1>
        <p class="mt-2 text-brand-100">Selamat datang di Sistem Informasi Surat.</p>
    </div>
 
    <div class="mt-6 grid gap-4 sm:grid-cols-2">
        <a href="{{ route('surat-masuk.index') }}"
           class="group card p-6 transition hover:-translate-y-0.5 hover:shadow-md">
            <h2 class="text-lg font-semibold text-slate-900 group-hover:text-brand-700">Surat Masuk</h2>
            <p class="mt-1 text-sm text-slate-500">Lihat Daftar Surat Masuk</p>
        </a>
 
        <a href="{{ route('surat-keluar.index') }}"
           class="group card p-6 transition hover:-translate-y-0.5 hover:shadow-md">
            <h2 class="text-lg font-semibold text-slate-900 group-hover:text-brand-700">Surat Keluar</h2>
            <p class="mt-1 text-sm text-slate-500">Lihat Daftar Surat Keluar</p>
        </a>
    </div>
@endsection

