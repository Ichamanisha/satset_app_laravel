<x-guest-layout>
    <div class="mb-8 text-center">
        <div class="text-2xl font-extrabold text-emerald-600 tracking-tighter">SATSET<span class="text-slate-900">.</span></div>
        <h2 class="text-xl font-bold text-slate-700 tracking-tight">Reset Password</h2>
    </div>

    <div class="mb-6 px-2 text-sm text-slate-500 leading-relaxed italic text-center">
        {{ __('Jangan panik! Masukkan alamat emailmu, dan kami akan kirimkan link reset password biar kamu bisa balik lapor lagi.') }}
    </div>

    <x-auth-session-status class="mb-4 text-center font-bold text-emerald-600" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-widest mb-2 ml-1">Email Terdaftar</label>
            <x-text-input id="email" class="block w-full px-5 py-4 bg-slate-50 border-slate-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all outline-none shadow-sm" type="email" name="email" :value="old('email')" required autofocus placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <button class="w-full flex justify-center py-4 rounded-2xl shadow-xl shadow-emerald-100 text-lg font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition transform hover:-translate-y-1">
                {{ __('Kirim Link Reset') }}
            </button>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <a href="{{ route('login') }}" class="text-sm font-extrabold text-emerald-600 hover:underline underline-offset-4 transition uppercase tracking-wider">
                <span class="inline-block mr-1">←</span> Kembali ke Login
            </a>
        </div>
    </form>
</x-guest-layout>
