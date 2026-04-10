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
                                    <td class="py-4 px-4 text-sm">
                                        <div class="flex items-center gap-4">
                                            <form action="{{ route('admin.reports.update', $report->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" onchange="this.form.submit()"
                                                    class="text-xs rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                                    <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="proses" {{ $report->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                                    <option value="selesai" {{ $report->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                            </form>

                                            <a href="{{ route('reports.show', $report->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 font-bold text-xs uppercase tracking-widest">
                                                Detail
                                            </a>
                                        </div>
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
