<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Riwayat Aduan Saya</h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto px-4">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('reports.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Kirim Aduan Baru
            </a>
        </div>

        @forelse($reports as $report)
            <div class="bg-white rounded shadow p-4 mb-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-lg">{{ $report->title }}</h3>
                        <p class="text-gray-500 text-sm">📍 {{ $report->location }}</p>
                        <p class="text-gray-500 text-sm">🕐 {{ $report->created_at->format('d M Y') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-semibold
                        {{ $report->status === 'Pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $report->status === 'Proses' ? 'bg-blue-100 text-blue-700' : '' }}
                        {{ $report->status === 'Selesai' ? 'bg-green-100 text-green-700' : '' }}">
                        {{ $report->status }}
                    </span>
                </div>
                <a href="{{ route('reports.show', $report) }}"
                   class="mt-2 inline-block text-blue-600 text-sm hover:underline">
                    Lihat Detail →
                </a>
            </div>
        @empty
            <div class="bg-white rounded shadow p-8 text-center text-gray-400">
                Kamu belum pernah mengirim aduan. 
                <a href="{{ route('reports.create') }}" class="text-blue-600 hover:underline">Kirim sekarang</a>
            </div>
        @endforelse
    </div>
</x-app-layout>