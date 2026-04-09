<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Detail Aduan</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto px-4">
        <div class="bg-white rounded shadow p-6 space-y-4">

            <div class="flex justify-between items-center">
                <h3 class="text-xl font-bold">{{ $report->title }}</h3>
                <span class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ $report->status === 'Pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                    {{ $report->status === 'Proses' ? 'bg-blue-100 text-blue-700' : '' }}
                    {{ $report->status === 'Selesai' ? 'bg-green-100 text-green-700' : '' }}">
                    {{ $report->status }}
                </span>
            </div>

            <p><span class="font-medium">📍 Lokasi:</span> {{ $report->location }}</p>
            <p><span class="font-medium">📝 Deskripsi:</span> {{ $report->description }}</p>
            <p><span class="font-medium">🕐 Dikirim:</span> {{ $report->created_at->format('d M Y, H:i') }}</p>

            @if($report->photo)
                <div>
                    <p class="font-medium mb-1">📷 Foto:</p>
                    <img src="{{ asset('storage/' . $report->photo) }}"
                         class="rounded max-w-full border" alt="Foto aduan">
                </div>
            @endif

            @if($report->admin_feedback)
                <div class="bg-blue-50 border border-blue-200 rounded p-4">
                    <p class="font-medium text-blue-700">💬 Balasan Admin:</p>
                    <p class="text-blue-600 mt-1">{{ $report->admin_feedback }}</p>
                </div>
            @endif

            <a href="{{ route('reports.index') }}" class="text-blue-600 hover:underline text-sm">
                ← Kembali ke Riwayat
            </a>
        </div>
    </div>
</x-app-layout>