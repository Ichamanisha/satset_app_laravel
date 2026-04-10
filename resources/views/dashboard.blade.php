<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-emerald-600 rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-emerald-200 relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-white text-3xl md:text-4xl font-black mb-2">Halo, {{ Auth::user()->name }}! 👋</h3>
                    <p class="text-emerald-100 text-lg max-w-md font-medium">
                        Ada fasilitas umum yang rusak? Yuk, laporin sekarang.
                    </p>
                </div>
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-emerald-500 rounded-full opacity-50"></div>
                <div class="absolute bottom-0 right-0 -mr-10 -mb-10 w-40 h-40 bg-emerald-400 rounded-full opacity-30"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm flex items-center gap-6">
                    <div class="bg-slate-100 p-4 rounded-2xl text-slate-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Total Aduan</p>
                        <p class="text-3xl font-black text-slate-800">{{ Auth::user()->reports->count() }}</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm flex items-center gap-6">
                    <div class="bg-amber-50 p-4 rounded-2xl text-amber-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Diproses</p>
                        <p class="text-3xl font-black text-slate-800">{{ Auth::user()->reports->where('status', 'pending')->count() }}</p>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm flex items-center gap-6">
                    <div class="bg-emerald-50 p-4 rounded-2xl text-emerald-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Selesai</p>
                        <p class="text-3xl font-black text-slate-800">{{ Auth::user()->reports->where('status', 'resolved')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                    <h4 class="font-bold text-slate-800 text-lg">Aduan Terbaru Kamu</h4>
                    <a href="{{ route('reports.index') }}" class="text-emerald-600 font-bold text-sm hover:underline">Lihat Semua</a>
                </div>
                <div class="p-4 md:p-8">
                    @if(Auth::user()->reports->count() > 0)
                        <div class="space-y-4">
                            {{-- Kita ambil 3 aduan terbaru saja untuk dashboard --}}
                            @foreach(Auth::user()->reports()->latest()->take(3)->get() as $report)
                                <div class="flex items-center justify-between p-4 rounded-2xl border border-slate-50 hover:bg-slate-50 transition">
                                    <div class="flex items-center gap-4">
                                        <div class="h-12 w-12 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold">
                                            #
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-800 line-clamp-1">{{ $report->title }}</p>
                                            <p class="text-xs text-slate-400 font-medium">{{ $report->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter
                                            {{ $report->status === 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                                            {{ $report->status === 'proses' ? 'bg-blue-100 text-blue-700' : '' }}
                                            {{ $report->status === 'selesai' ? 'bg-emerald-100 text-emerald-700' : '' }}">
                                            {{ $report->status }}
                                        </span>
                                        <a href="{{ route('reports.show', $report) }}" class="p-2 hover:bg-white rounded-lg transition shadow-sm border border-transparent hover:border-slate-100">
                                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col items-center gap-4 py-8">
                            <div class="bg-slate-50 p-6 rounded-full text-slate-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            </div>
                            <p class="text-slate-500 font-medium text-center">Belum ada aduan nih. <br> Keliling sekitar yuk, siapa tahu ada yang perlu diperbaiki!</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
