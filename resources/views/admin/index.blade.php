<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel Admin - Kelola Aduan SATSET') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-100">
                                <th class="py-3 px-4 text-sm font-semibold text-gray-600">Pelapor</th>
                                <th class="py-3 px-4 text-sm font-semibold text-gray-600">Judul Aduan</th>
                                <th class="py-3 px-4 text-sm font-semibold text-gray-600">Lokasi</th>
                                <th class="py-3 px-4 text-sm font-semibold text-gray-600">Status</th>
                                <th class="py-3 px-4 text-sm font-semibold text-gray-600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr class="border-b border-gray-50 hover:bg-gray-50 transition">
                                    <td class="py-4 px-4 text-sm text-gray-700">{{ $report->user->name }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-700 font-medium">{{ $report->title }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-500">{{ $report->location }}</td>
                                    <td class="py-4 px-4">
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $report->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $report->status == 'proses' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $report->status == 'selesai' ? 'bg-green-100 text-green-800' : '' }}">
                                            {{ ucfirst($report->status) }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-sm">
                                        <a href="#"
                                            class="text-indigo-600 hover:text-indigo-900 font-bold">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
