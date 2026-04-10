<x-guest-layout>
    <div class="mb-8 text-center">
        <div class="text-2xl font-extrabold text-emerald-600 tracking-tighter">SATSET<span class="text-slate-900">.</span></div>
        <h2 class="text-xl font-bold text-slate-700 tracking-tight">Selamat Datang Kembali!</h2>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Email</label>
            <x-text-input id="email" class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all outline-none shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Password</label>
            <x-text-input id="password" class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all outline-none shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between px-1">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-lg border-slate-300 text-emerald-600 shadow-sm focus:ring-emerald-500" name="remember">
                <span class="ms-2 text-xs font-medium text-slate-500 italic">{{ __('Ingat Saya') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-xs font-bold text-emerald-600 hover:text-emerald-700 transition" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            @endif
        </div>

        <div class="pt-4">
            <button class="w-full flex justify-center py-4 rounded-2xl shadow-xl shadow-emerald-100 text-lg font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition transform hover:-translate-y-1">
                {{ __('Masuk Sekarang') }}
            </button>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <p class="text-sm text-slate-500">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-extrabold text-emerald-600 hover:underline underline-offset-4 transition">
                    Daftar Sat-Set
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
