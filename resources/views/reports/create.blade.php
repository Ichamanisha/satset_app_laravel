<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kirim Aduan SATSET') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto px-4">

        @if($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-2xl mb-6 shadow-sm">
                <p class="font-bold mb-1">Waduh, ada yang kurang nih:</p>
                <ul class="text-sm list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 space-y-6">

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">Judul Aduan <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           class="w-full border-slate-200 rounded-2xl px-4 py-3 focus:border-emerald-500 focus:ring-emerald-500 transition"
                           placeholder="Contoh: Jalan rusak depan sekolah">
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">Lokasi <span class="text-red-500">*</span></label>
                    <input type="text" name="location" value="{{ old('location') }}"
                           class="w-full border-slate-200 rounded-2xl px-4 py-3 focus:border-emerald-500 focus:ring-emerald-500 transition"
                           placeholder="Contoh: Jl. Merdeka No. 10, Bandung">
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">Deskripsi Detail <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="4"
                              class="w-full border-slate-200 rounded-2xl px-4 py-3 focus:border-emerald-500 focus:ring-emerald-500 transition"
                              placeholder="Jelaskan detail masalahnya di sini...">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-black text-slate-700 mb-2 uppercase tracking-wide">Foto Bukti (Opsional)</label>

                    <div onclick="document.getElementById('photo-input').click()"
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-[2rem] hover:border-emerald-400 hover:bg-emerald-50 transition cursor-pointer bg-slate-50 group">

                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-slate-400 group-hover:text-emerald-500 transition duration-300" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <div class="flex text-sm text-slate-600 justify-center">
                                <span id="file-chosen" class="font-bold text-emerald-600 hover:text-emerald-500">
                                    Upload file
                                </span>
                                <p class="pl-1">atau drag and drop</p>

                                <input type="file"
                                    id="photo-input"
                                    name="photo"
                                    accept="image/*"
                                    class="sr-only"
                                    onchange="updateFileName(this)">
                            </div>
                            <p class="text-xs text-slate-500">PNG, JPG up to 2MB</p>
                        </div>
                    </div>
                </div>

                <script>
                    function updateFileName(input) {
                        const display = document.getElementById('file-chosen');
                        if (input.files && input.files[0]) {
                            display.innerText = "Terpilih: " + input.files[0].name;
                            display.classList.remove('text-emerald-600');
                            display.classList.add('text-slate-800');
                        }
                    }
                </script>

                <button type="submit"
                        class="w-full bg-emerald-600 text-white py-4 rounded-2xl font-black text-lg hover:bg-emerald-700 shadow-xl shadow-emerald-100 transition transform hover:-translate-y-1 active:scale-95 text-center">
                    Kirim Aduan Sekarang!
                </button>

                <div class="text-center">
                    <a href="{{ route('reports.index') }}" class="text-slate-400 text-sm font-bold hover:text-emerald-600 transition">
                        ← Batal & Kembali
                    </a>
                </div>

            </div>
        </form>
    </div>
</x-app-layout>
