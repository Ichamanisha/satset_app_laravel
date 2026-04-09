<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Kirim Aduan</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto px-4">

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white p-6 rounded shadow">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Aduan</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           class="w-full border rounded px-3 py-2"
                           placeholder="Contoh: Jalan rusak depan sekolah">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4"
                              class="w-full border rounded px-3 py-2"
                              placeholder="Jelaskan detail masalah...">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                    <input type="text" name="location" value="{{ old('location') }}"
                           class="w-full border rounded px-3 py-2"
                           placeholder="Contoh: Jl. Merdeka No. 10, Bandung">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto (opsional)</label>
                    <input type="file" name="photo" accept="image/*"
                           class="w-full border rounded px-3 py-2">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-semibold text-center">
                    Kirim Aduan
                </button>

            </div>

        </form>
    </div>
</x-app-layout>