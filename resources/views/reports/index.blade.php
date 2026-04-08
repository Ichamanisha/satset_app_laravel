<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Aduan SATSET') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @foreach ($reports as $report)
                    <div class="mb-4 p-4 border-b">
                        <h3 class="font-bold text-lg">{{ $report->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $report->location }}</p>
                        <p class="mt-2">{{ $report->description }}</p>
                        <div class="mt-2">
                            <span class="px-2 py-1 text-xs rounded-full
                                {{ $report->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $report->status == 'proses' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $report->status == 'selesai' ? 'bg-green-100 text-green-800' : '' }}">
                                {{ strtoupper($report->status) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
