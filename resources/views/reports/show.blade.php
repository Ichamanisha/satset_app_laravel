<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Aduan SATSET') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto px-4">
        <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 p-8 space-y-6">

            <div class="flex justify-between items-start border-b border-slate-50 pb-6">
                <div>
                    <h3 class="text-2xl font-black text-slate-800 tracking-tight">{{ $report->title }}</h3>
                    <p class="text-slate-400 text-sm font-bold uppercase tracking-widest mt-1">
                        {{ $report->created_at->format('d M Y, H:i') }}
                    </p>
                </div>

                <span
                    class="px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-tighter
                    {{ $report->status === 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                    {{ $report->status === 'proses' ? 'bg-blue-100 text-blue-700' : '' }}
                    {{ $report->status === 'selesai' ? 'bg-emerald-100 text-emerald-700' : '' }}">
                    {{ $report->status }}
                </span>
            </div>

            <div class="space-y-4 text-slate-700">
                <div class="flex items-start gap-3">
                    <span class="bg-slate-100 p-2 rounded-lg text-lg">📍</span>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Lokasi Kejadian</p>
                        <p class="font-bold text-slate-800">{{ $report->location }}</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <span class="bg-slate-100 p-2 rounded-lg text-lg">📝</span>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Deskripsi Laporan</p>
                        <p class="leading-relaxed">{{ $report->description }}</p>
                    </div>
                </div>
            </div>

            @if ($report->image)
                <div class="pt-4">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3">📷 Lampiran Foto</p>
                    <div class="rounded-[2rem] overflow-hidden border-4 border-slate-50 shadow-inner bg-slate-50">
                        <img src="{{ asset('storage/' . $report->image) }}"
                            class="w-full h-auto object-cover hover:scale-105 transition duration-500"
                            alt="Foto aduan">
                    </div>
                </div>
            @else
                <div class="pt-4">
                    <p class="text-slate-400 text-sm italic">Tidak ada foto yang dilampirkan.</p>
                </div>
            @endif

            @if ($report->admin_feedback)
                <div class="bg-emerald-50 border-2 border-emerald-100 rounded-[2rem] p-6 relative overflow-hidden">
                    <div class="relative z-10">
                        <p class="font-black text-emerald-800 flex items-center gap-2 mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                                </path>
                            </svg>
                            Tanggapan Admin
                        </p>
                        <p class="text-emerald-700 font-medium leading-relaxed italic">"{{ $report->admin_feedback }}"
                        </p>
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-emerald-100 rounded-full opacity-50"></div>
                </div>
            @endif

            <div class="pt-6">
                <a href="{{ route('reports.index') }}"
                    class="inline-flex items-center gap-2 text-slate-400 font-bold text-sm hover:text-emerald-600 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Riwayat
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
