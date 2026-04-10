<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SATSET - Platform Aspirasi Publik Cepat</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-slate-50 text-slate-900 font-[Figtree]">

    <nav class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
        <div class="text-2xl font-extrabold text-emerald-600 tracking-tighter">
            SATSET<span class="text-slate-900">.</span>
        </div>
        <div class="space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-slate-600 hover:text-emerald-600 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-slate-600 hover:text-emerald-600 transition">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-emerald-600 text-white px-6 py-2.5 rounded-full font-bold hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition">Join Gerakan SatSet!</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 pt-16 pb-24 text-center lg:text-left lg:flex lg:items-center lg:gap-16">
        <div class="lg:w-1/2">
            <div class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-wider text-emerald-700 uppercase bg-emerald-100 rounded-full">
                #SolusiCepatAduanPublik
            </div>
            <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight mb-6 text-slate-900 tracking-tight"> Gak Pake <span class="text-emerald-600"> Drama </span>, <br> Lapor Publik Jadi <br>
                <span class="text-emerald-600">Sat-Set.</span>
            </h1>
            <p class="text-lg text-slate-600 mb-10 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                Sampaikan kendala fasilitas umum di sekitarmu sekarang. Kami pangkas jalur birokrasi yang rumit agar aduanmu langsung dieksekusi oleh tim terkait. Cepat, transparan, dan pastinya Sat-Set!
            </p>
            <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-emerald-600 text-white rounded-2xl font-bold text-lg hover:bg-emerald-700 shadow-xl shadow-emerald-100 transition transform hover:-translate-y-1">
                    Kirim Aduan Sekarang
                </a>
            </div>
        </div>

        <div class="hidden lg:block lg:w-1/2">
            <div class="relative">
                <div class="absolute -inset-4 bg-emerald-50 rounded-[3rem] rotate-2"></div>
                <div class="relative bg-white p-3 rounded-[2.5rem] shadow-2xl border border-slate-100">
                    <img src="https://images.pexels.com/photos/443383/pexels-photo-443383.jpeg?auto=compress&cs=tinysrgb&w=1000"
                        class="rounded-[2rem] brightness-95"
                        alt="Aspirasi Masyarakat">
                <div class="absolute -bottom-6 -right-10 bg-white p-5 rounded-2xl shadow-xl flex items-center gap-4 border border-slate-50">
                    <div class="bg-emerald-500 p-2.5 rounded-xl text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Efisiensi Alur</p>
                        <p class="text-sm font-bold text-slate-800 italic">"Sat-Set" Perbaikan</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="max-w-7xl mx-auto px-6 py-16 border-t border-slate-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="text-emerald-700 font-bold text-xl uppercase tracking-widest">Tentang SATSET</div>
            <div class="text-slate-600 text-lg leading-relaxed italic">
                "SATSET hadir untuk memastikan setiap fasilitas umum yang bermasalah mendapat perhatian yang layak secara instan."
            </div>
        </div>
    </section>

    <footer class="py-12 border-t border-slate-100 bg-white/50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="text-center md:text-left">
                    <div class="text-2xl font-black text-emerald-600 tracking-tighter">
                        SATSET<span class="text-slate-900">.</span>
                    </div>
                    <p class="text-slate-500 text-xs mt-1 font-medium tracking-wide uppercase">
                        Solusi Cepat Aduan Publik
                    </p>
                </div>

                <div class="text-slate-400 text-sm font-medium order-3 md:order-2">
                    &copy; 2026 <span class="text-slate-600 font-bold">SATSET Team</span>. All rights reserved.
                </div>

                <div class="order-2 md:order-3">
                    <a href="https://wa.me/62895601305894?text=Halo%20Admin%20SATSET,%20saya%20ingin%20bertanya..."
                    target="_blank"
                    class="group flex items-center gap-2 px-5 py-2 rounded-xl bg-emerald-50 text-emerald-700 text-sm font-bold hover:bg-emerald-600 hover:text-white transition-all border border-emerald-100 shadow-sm">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        WhatsApp Admin
                    </a>
                </div>

            </div>
        </div>
    </footer>

</body>
</html>
