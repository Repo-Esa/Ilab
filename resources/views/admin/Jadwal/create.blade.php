<x-app-layout>
    <div class="p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Tambah Jadwal</h1>

        <form action="{{ route('admin.jadwal.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- HARI --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Hari</label>
                <select name="hari"
                    class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-900 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Hari --</option>
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                        <option value="{{ $hari }}" class="text-gray-900 dark:text-gray-100">{{ $hari }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- JAM --}}
            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Jam Mulai</label>
                    <input type="time" name="jam_mulai"
                        class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-900 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex-1">
                    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Jam Selesai</label>
                    <input type="time" name="jam_selesai"
                        class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-900 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            {{-- MAPEL --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Mata Pelajaran</label>
                <input type="text" name="mapel"
                    class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-900 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- GURU --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Guru</label>
                <select name="guru_id"
                    class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-900 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Guru --</option>
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}" class="text-gray-900 dark:text-gray-100">
                            {{ $guru->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- RUANGAN --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Ruangan</label>
                <select name="ruangan_id"
                    class="w-full border border-gray-300 rounded-lg p-2 bg-white text-gray-900 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Pilih Ruangan --</option>
                    @foreach ($ruangans as $ruangan)
                        <option value="{{ $ruangan->id }}" class="text-gray-900 dark:text-gray-100">
                            {{ $ruangan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('admin.jadwal.index') }}"
                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-500">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
