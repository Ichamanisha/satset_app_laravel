<x-guest-layout>
    <div class="mb-8 text-center">
        <div class="text-2xl font-extrabold text-emerald-600 tracking-tighter">SATSET<span class="text-slate-900">.</span></div>
        <h2 class="text-xl font-bold text-slate-700 tracking-tight">Buat Akun Baru</h2>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Nama Lengkap</label>
            <x-text-input id="name" class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all outline-none shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Rifqi Satset" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Email</label>
            <x-text-input id="email" class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all outline-none shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Password</label>
                <x-text-input id="password" class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all outline-none shadow-sm"
                                type="password"
                                name="password"
                                required autocomplete="new-password"
                                placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="password_confirmation" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Konfirmasi</label>
                <x-text-input id="password_confirmation" class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all outline-none shadow-sm"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="••••••••" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="pt-4">
            <button class="w-full flex justify-center py-4 rounded-2xl shadow-xl shadow-emerald-100 text-lg font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition transform hover:-translate-y-1">
                {{ __('Daftar Sekarang') }}
            </button>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <p class="text-sm text-slate-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-extrabold text-emerald-600 hover:underline underline-offset-4 transition text-xs uppercase tracking-wider">
                    {{ __('Log in di sini') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
