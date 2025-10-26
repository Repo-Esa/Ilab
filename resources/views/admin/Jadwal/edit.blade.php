<x-app-layout>
    <div class="p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Edit Jadwal</h1>

        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium">Hari</label>
                <select name="hari" class="w-full border rounded-lg p-2">
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                        <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>
                            {{ $hari }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block mb-1 font-medium">Jam Mulai</label>
                    <input type="time" name="jam_mulai" value="{{ $jadwal->jam_mulai }}"
                        class="w-full border rounded-lg p-2">
                </div>
                <div class="flex-1">
                    <label class="block mb-1 font-medium">Jam Selesai</label>
                    <input type="time" name="jam_selesai" value="{{ $jadwal->jam_selesai }}"
                        class="w-full border rounded-lg p-2">
                </div>
            </div>

            <div>
                <label class="block mb-1 font-medium">Mata Pelajaran</label>
                <input type="text" name="mapel" value="{{ $jadwal->mapel }}" class="w-full border rounded-lg p-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">Guru</label>
                <select name="guru_id" class="w-full border rounded-lg p-2">
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}" {{ $jadwal->guru_id == $guru->id ? 'selected' : '' }}>
                            {{ $guru->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Ruangan</label>
                <select name="ruangan_id" class="w-full border rounded-lg p-2">
                    @foreach ($ruangans as $ruangan)
                        <option value="{{ $ruangan->id }}"
                            {{ $jadwal->ruangan_id == $ruangan->id ? 'selected' : '' }}>
                            {{ $ruangan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('admin.jadwal.index') }}"
                    class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Perbarui</button>
            </div>
        </form>
    </div>
</x-app-layout>
