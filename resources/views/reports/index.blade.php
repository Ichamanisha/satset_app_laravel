<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Aduan SATSET') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4 shadow-sm">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="mb-6">
                <a href="{{ route('reports.create') }}"
                   class="bg-emerald-600 text-white px-6 py-2.5 rounded-full font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-100">
                    + Kirim Aduan Baru
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-[2rem] p-6 border border-slate-100">
                @forelse ($reports as $report)
                    <div class="mb-6 p-4 border-b border-slate-50 last:border-0 hover:bg-slate-50 rounded-2xl transition">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold text-lg text-slate-800">{{ $report->title }}</h3>
                                <p class="text-sm text-slate-500 italic">📍 {{ $report->location }}</p>
                                <p class="mt-2 text-slate-600 line-clamp-2">{{ $report->description }}</p>
                            </div>

                            <span class="px-3 py-1 text-xs font-black rounded-full uppercase tracking-tighter
                                {{ $report->status == 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                                {{ $report->status == 'proses' ? 'bg-blue-100 text-blue-700' : '' }}
                                {{ $report->status == 'selesai' ? 'bg-emerald-100 text-emerald-700' : '' }}">
                                {{ $report->status }}
                            </span>
                        </div>

                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-[10px] text-slate-400 font-bold tracking-widest uppercase">
                                {{ $report->created_at->format('d M Y') }}
                            </span>
                            <a href="{{ route('reports.show', $report) }}"
                               class="text-emerald-600 text-sm font-bold hover:underline">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="py-12 text-center">
                        <div class="bg-slate-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                        </div>
                        <p class="text-slate-500 font-medium">Belum ada aduan nih.</p>
                        <a href="{{ route('reports.create') }}" class="text-emerald-600 text-sm font-bold hover:underline">Kirim sekarang</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
