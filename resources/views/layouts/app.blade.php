<!DOCTYPE html>
<html lang="id">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SIM-Surat</title>
 
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
 
<body class="flex min-h-screen flex-col bg-brand-50 font-sans text-slate-800 antialiased">
 
    <header class="bg-brand-700 shadow">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-3 px-4 py-3">
            <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-accent">
                Sistem Informasi Surat
            </a>
 
            <nav class="flex flex-wrap items-center gap-1 text-sm">
                <a href="{{ route('dashboard') }}"
                   class="rounded-md px-3 py-2 font-medium {{ request()->routeIs('dashboard') ? 'bg-accent text-brand-900' : 'text-brand-100 hover:bg-brand-600' }}">
                    Dashboard
                </a>
                <a href="{{ route('surat-masuk.index') }}"
                   class="rounded-md px-3 py-2 font-medium {{ request()->routeIs('surat-masuk.*') ? 'bg-accent text-brand-900' : 'text-brand-100 hover:bg-brand-600' }}">
                    Surat Masuk
                </a>
                <a href="{{ route('surat-keluar.index') }}"
                   class="rounded-md px-3 py-2 font-medium {{ request()->routeIs('surat-keluar.*') ? 'bg-accent text-brand-900' : 'text-brand-100 hover:bg-brand-600' }}">
                    Surat Keluar
                </a>
 
                @auth
                    <span class="ml-2 flex items-center gap-2 text-brand-100">
                        <span class="hidden sm:inline">Masuk sebagai: {{ auth()->user()->name }}</span>
                        <span class="rounded-full bg-lilac px-2 py-0.5 text-xs font-medium text-brand-900">{{ auth()->user()->role }}</span>
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="ml-1 cursor-pointer rounded-md bg-white/10 px-3 py-2 font-medium text-white transition hover:bg-white/20">
                            Keluar
                        </button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>
 
    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8">
        @yield('content')
    </main>
 
    <footer class="border-t border-slate-200 py-6 text-center text-sm text-slate-500">
        <p>Sistem Informasi Surat</p>
    </footer>
 
</body>
</html>

