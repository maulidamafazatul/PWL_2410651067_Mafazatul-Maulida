<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Surat</title>
 
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-brand-700 px-4 font-sans text-slate-800 antialiased">
 
    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-xl">
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-slate-900">Login SIM-Surat</h1>
            <p class="mt-1 text-sm text-slate-500">Masuk untuk melihat dan mengelola surat.</p>
        </div>
 
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf
 
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="form-input @error('email') border-red-500 @enderror">
                @error('email') <p class="form-error">{{ $message }}</p> @enderror
            </div>
 
            <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password"
                       class="form-input @error('password') border-red-500 @enderror">
                @error('password') <p class="form-error">{{ $message }}</p> @enderror
            </div>
 
            <button type="submit" class="btn btn-primary w-full py-2.5">Masuk</button>
        </form>
    </div>
 
</body>
</html>

